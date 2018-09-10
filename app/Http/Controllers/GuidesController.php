<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidesController extends Controller
{

    /**
     * Show the about me page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guides');
    }
}
