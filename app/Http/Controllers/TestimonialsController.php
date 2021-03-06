<?php

namespace App\Http\Controllers;

use App\Testimonials;
use Illuminate\Support\Facades\Validator;
use App\Profile;
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

            $data = DB::table('testimonials')
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

    public function store(Request $request, $locale)
    {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'recaptcha',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->getMessages()['g-recaptcha-response'][0]);
            $testimonials = DB::table('testimonials')
                ->orderBy("created_at", "desc")
                ->take(10)
                ->get();

            $profile = Profile::query()->first();

            $data = ["name"=>"","t_name"=>$request->name,"email"=>"","phone"=>"","text"=>"", "testimonials"=>$request->testimonials];
            return view('contacts', compact(["profile", "testimonials","data"]));
        }
        DB::table('testimonials')->insert(
            [
                'name' => $request->name,
                'testimonials' => $request->testimonials,
                'foto' => $request->foto,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
        return Redirect::route("contacts");
    }

    public function edit(string $lang, Testimonials $testimonial)
    {
        return view('admin.testimonials.edit', ["testimonials" => $testimonial]);
    }

    public function update(Request $request, string $lang, Testimonials $testimonial)
    {
        $testimonial->fill([
            'name' => $request->name,
            'testimonials' => $request->testimonials,
            'updated_at' => new DateTime()
        ]);
        $testimonial->save();

        return Redirect::route("testimonials.index", [$lang]);
    }

    public function destroy(string $lang, Testimonials $testimonial)
    {
        $success = $testimonial->delete();
        return ["success" => $success];
    }
}