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

    public function read(Request $request)
    {
        $count = DB::table('emails')->count();
        $data = [];

        if ($count){
            $data = DB::table('emails')
                ->orderBy("created_at", "desc")
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
