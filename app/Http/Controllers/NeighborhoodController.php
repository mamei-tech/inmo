<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NeighborhoodController extends Controller
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
     * Show the neighborhood page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('neighborhood');
    }

    /**
     * Get house.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadHauses($page, $cantByPage = 8)
    {
        return null;
    }
}