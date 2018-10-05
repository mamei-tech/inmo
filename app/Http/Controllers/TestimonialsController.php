<?php

namespace App\Http\Controllers;

use App\Testimonials;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TestimonialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['store']);
    }

    public function index()
    {
        return view('admin.testimonials.index');
    }

    public function read(Request $request)
    {
        $count = DB::table('testimonials')->count();
        $data = [];

        if ($count){
            $data = DB::table('testimonials')
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

    public function store(Request $request, $locale)
    {
        DB::table('testimonials')->insert(
            [
                'name' => $request->name,
                'testimonials' => $request->testimonials,
                'foto' => $request->foto,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        return Redirect::action('ContactsController@index');
    }

    public function edit(string $lang, Testimonials $testimonials)
    {
        return view('admin.testimonials.edit', ["testimonials" => $testimonials]);
    }

    public function destroy(string $lang, Testimonials $testimonials)
    {
        $success = $testimonials->delete();
        return ["success" => $success];
    }
}