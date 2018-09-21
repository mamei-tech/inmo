<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Slider;
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
        $sliders = Slider::query()->orderByDesc("created_at")->get();
        $promotions = Promotion::query()->whereNotNull("image")->orderByDesc("created_at")->get();
        $promotionsSecond = Promotion::query()->whereNull("image")->orderByDesc("created_at")->get();
        return view('home', compact(["sliders", "promotions", "promotionsSecond"]));
    }
}
