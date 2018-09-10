<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutMeController extends Controller
{
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