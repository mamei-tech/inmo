<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
      /**
     * Show the neighborhood page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('neighborhood');
    }

    public function houses()
    {
        return view('houses');
    }

    public function infoHouse()
    {
        return view('infoHouse');
    }
}