<?php

namespace App\Http\Controllers;

use App\Profile;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'storeTestimonials']);
    }

    public function index()
    {
        $testimonials = DB::table('testimonials')->get();
        $profile = Profile::query()->first();
        return view('contacts', compact(["profile", "testimonials"]));
    }
}