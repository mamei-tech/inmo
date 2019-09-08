<?php

namespace App\Http\Controllers;


class BlogController extends Controller
{
    public function indexWeb()
    {
         return view('blog');
    }
}
