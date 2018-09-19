<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class ResetPasswordController extends Controller
{

    protected $hasher;

    public function __construct(HasherContract $hasher)
    {
        $this->middleware('auth');
        $this->hasher = $hasher;
    }

    public function showSetForm()
    {
        return view("Auth.passwords.set");
    }

    public function setPassword(Request $request, string $lang)
    {
        $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (!$this->hasher->check($value, Auth::user()->getAuthPassword())) {
                    return $fail($attribute . __(' is invalid.'));
                }
            }],
            'new_password' => 'required|min:8|max:50',
            'new_password_confirmation' => 'same:new_password'
        ]);

        Auth::user()->password = $this->hasher->make($request->new_password);
        $saved = Auth::user()->save();

        $request->session()->flash('status', $saved ? __('passwords.change') : "error");
        return Redirect::route("password.set", [$lang]);
    }
}
