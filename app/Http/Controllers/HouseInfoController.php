<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseInfoController extends Controller
{
    /**
     * Show the house info page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('houseInfo');
    }
}