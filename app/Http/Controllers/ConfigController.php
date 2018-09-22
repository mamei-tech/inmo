<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 19/9/2018
 * Time: 18:26
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showConfigLogo()
    {
        return view("admin.config.index");
    }

    public function configLogo(Request $request, $locale)
    {
       if ( $request->file('logo_company'))
            $request->file('logo_company')->storeAs('public/logo','company.png');

        if ( $request->file('logo_personal'))
            $request->file('logo_personal')->storeAs('public/logo', 'personal.png');

        $request->session()->flash('status', __('app.success_logo_change'));
        return Redirect::route("config.logo", [$locale]);
    }
}