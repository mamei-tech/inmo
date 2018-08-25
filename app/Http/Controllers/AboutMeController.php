<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        //TODO: This is a Note. Do this for Admin section. See tiketike.txt for details
        $this->middleware('auth');
    }*/

    /**
     * Show the about me page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aboutMe');
    }
}