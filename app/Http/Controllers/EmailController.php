<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.email.index');
    }

    public function readGuide(Request $request)
    {
        $count = DB::table('emails')->where('type', 'guide')->count();
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

            $data = DB::table('emails')
                ->where('type', 'guide')
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

    public function readContact(Request $request)
    {
        $count = DB::table('emails')->where('type', 'contact')->count();
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

            $data = DB::table('emails')
                ->where('type', 'contact')
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

    public function destroy(string $lang, Email $email)
    {
        $success = $email->delete();
        return ["success" => $success];
    }
}
