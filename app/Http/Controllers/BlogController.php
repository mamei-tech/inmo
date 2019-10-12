<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function indexWeb()
    {
        return Auth::user() ? view('blog', ['user' => Auth::user()->name]) : view('blog');
    }
}
