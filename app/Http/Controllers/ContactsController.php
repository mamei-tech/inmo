<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
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