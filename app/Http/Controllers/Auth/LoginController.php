<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

use Barryvdh\Debugbar\Facade as Debugbar;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $user = User::where('email', $request->email)->first();

        // user, admin and login from admin loging form
        if ($user && $user->hasRole('admon') && $request->has('pit'))               // Login from original login form
        {
            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);                              // Login ok
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }
        else if ($user && !$request->has('pit'))                                    // Login from blog form
        {
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {                                        // Login ok

                $request->session()->regenerate();
                $this->clearLoginAttempts($request);

                return $this->authenticated($request, $this->guard()->user())
                    ?: redirect()->route('blog');
            }

            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.authAdmin')],
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        session(['locale' => app()->getLocale()]);

        if($request->has('from') && $request->get('from') == 'blog')                        // Logout from blog
            return redirect("/".app()->getLocale()."/blog");
        else
            return $this->loggedOut($request) ?: redirect("/".app()->getLocale()."/admin");
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($locale, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($locale, $provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser                    = new User;

            $newUser->provider_name     = $provider;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->avatar            = $user->getAvatar();
            $newUser->save();

            auth()->login($newUser, true);
        }

        // return redirect($this->redirectPath());
        return redirect()->route('blog');
    }
}
