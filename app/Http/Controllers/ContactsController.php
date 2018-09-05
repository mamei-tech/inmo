<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
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
     * Show the contacts page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts');
    }
}