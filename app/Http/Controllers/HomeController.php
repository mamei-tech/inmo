<?php

namespace App\Http\Controllers;

use App\test;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = test::all();

        return view('home', compact(['flights']));
    }
}
