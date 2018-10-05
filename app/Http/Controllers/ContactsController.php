<?php

namespace App\Http\Controllers;

use App\Profile;
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
        $profile = Profile::query()->first();
        return view('contacts', compact(["profile"]));
    }

    public function callAction($method, $parameters)
    {
        return ;
    }
}