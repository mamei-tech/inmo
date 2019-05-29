<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $date = new DateTime();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token_verified_email' => Hash::make($data['email'].$date->format('Y-m-d H:i:s')),
            'provider' => 'Local',
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

//        Mail::send("auth.register_email_verification", ["token" => $user->token_verified_email], function ($m) use ($request) {
//            $m->from(env("MAIL_NOREPLY_ADDRESS"), env("MAIL_NOREPLY_NAME"));
//            $m->to($user->email)->subject(__('app.email_confirmation'));
//        });

        //return redirect(route('auth.verify', [App::getLocale(), 'user_id' => $user->id]));

//        Esto es temporal pq no tengo configurado el correo pa simular el flujo
        return view("auth.register_email_verification", ["token" => $user->token_verified_email]);
    }

    public function registerEmailVerification(Request $request)
    {
        $user = User::where('token_verified_email', $request->token)->first();
        if ($user)
        {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            return redirect(route('login'))->withInput()->with('message', 'Se verifico correctamente la cuenta. Ya puede acceder!!!');
        }

//        TODO AKi es cuando no encuentra el user ver que pasa
        return redirect(route('home'))->withInput()->with('message', 'Este link no es de una cuenta valida.');
    }

    public function verify(Request $request)
    {
        return view('auth.verify', [App::getLocale(), 'user_id' => $request->user_id]);
    }

    public function resend(Request $request)
    {
        $date = new DateTime();
        $user = User::where('id', $request->user_id)->first();
        $token = Hash::make($user->email.$date->format('Y-m-d H:i:s'));

        if ($user)
        {
            $user->update([
                'token_verified_email' => $token
            ]);

//        Mail::send("auth.register_email_verification", ["token" => $token], function ($m) use ($request) {
//            $m->from(env("MAIL_NOREPLY_ADDRESS"), env("MAIL_NOREPLY_NAME"));
//            $m->to($user->email)->subject(__('app.email_confirmation'));
//        });

            return redirect(route('auth.verify', [App::getLocale(), 'user_id' => $user->id]));

//        Esto es temporal pq no tengo configurado el correo pa simular el flujo
            //return view("auth.register_email_verification", ["token" => $token]);
        }

//        TODO AKi es cuando no encuentra el user ver que pasa
        return redirect(route('home'))->withInput()->with('message', 'Este link no es de una cuenta valida.');
    }
}
