<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function read(Request $request)
    {
        $admon = User::role('admon')->first();
        $users = User::where('id', '<>', $admon->id)
            ->where('lock', false);

        $count = $users->count();
        $data = [];

        if ($count) {
            $column = "created_at";
            $direction = "desc";

            if ($request->sort)
            {
                $sort = explode('~', $request->sort);
                $last = collect($sort)->last();

                $last = collect(explode('-', $last));
                $column = $last->first();
                $direction = $last->last();
            }

            $data = $users
                ->orderBy($column, $direction)
                ->skip(($request->page - 1) * $request->pageSize)
                ->take($request->pageSize)
                ->get();
        }

        return [
            "Count" => $count,
            "Data" => $data
        ];
    }

    public function lock(Request $request)
    {
        $success = DB::table('users')->where('id', $request->id)
            ->update(['lock' => true]);
        return ["success" => $success];
    }
}
