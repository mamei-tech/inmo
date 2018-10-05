<?php

namespace App\Http\Controllers;

use App\Profile;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    /**
     * Show the contacts page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = DB::table('testimonials')->get();
        $profile = Profile::query()->first();
        return view('contacts', compact(["profile", "testimonials"]));
    }

    public function storeTestimonials(Request $request, $locale)
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
}