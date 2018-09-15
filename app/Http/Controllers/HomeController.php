<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::query()->whereNotNull("image")->get();
        $promotionsSecond = Promotion::query()->whereNull("image")->get();
        return view('home', compact(["promotions", "promotionsSecond"]));
    }
}
