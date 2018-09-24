<?php

namespace App\Http\Controllers;

use App\Profile;
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
        $profile = Profile::query()->first();
        return view('aboutMe', compact(["profile"]));
    }
}