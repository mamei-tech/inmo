<?php

namespace App\Http\Controllers;

use App\Profile;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = Profile::query()->first();
        return view('admin.profile.index', compact(["profile"]));
    }

    public function privacy(){
        $profile = Profile::query()->first();
        return view('admin.profile.privacy', compact(["profile"]));
    }

    public function update(Request $request, string $lang, Profile $profile)
    {
        $profile->fill([
            'bio_es' => $request->bio_es,
            'bio_en' => $request->bio_en,
            'email' => $request->email,
            'site_web' => $request->site_web,
            'phone' => $request->phone,
            'address' => $request->address,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_in' => $request->link_in,
            'link_youtube' => $request->link_youtube,
            'updated_at' => new DateTime()
        ]);
        
        if ($profile->save()) {
            $request->session()->flash('status', __('app.success_edit_profile'));
            return Redirect::route("admin", [$lang]);
        }

        $request->session()->flash('status', __('app.error'));
        return Redirect::route("profile", compact(["lang", "profile"]));
    }

    public function privacyUpdate(Request $request, string $lang, Profile $profile)
    {
        $profile->fill([
            'privacy_es' => $request->privacy_es,
            'privacy_en' => $request->privacy_en,
            'updated_at' => new DateTime()
        ]);

        if ($profile->save()) {
            $request->session()->flash('status', __('app.success_edit'));
            return Redirect::route("admin", [$lang]);
        }

        $request->session()->flash('status', __('app.error'));
        return Redirect::route("privacy", compact(["lang", "profile"]));
    }
}
