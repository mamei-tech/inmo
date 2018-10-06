<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Profile;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['indexWeb', 'store']);
    }

    public function indexWeb()
    {
        $testimonials = DB::table('testimonials')
            ->orderBy("created_at", "desc")
            ->take(10)
            ->get();

        $profile = Profile::query()->first();

        return view('contacts', compact(["profile", "testimonials"]));
    }

    public function index()
    {
        return view('admin.contacts.index');
    }

    public function read(Request $request)
    {
        $count = DB::table('contact')->count();
        $data = [];

        if ($count) {
            $data = DB::table('contact')
                ->orderBy("created_at", "desc")
                ->skip(($request->page - 1) * $request->pageSize)
                ->take($request->pageSize)
                ->get();
        }

        return [
            "Count" => $count,
            "Data" => $data
        ];
    }

    public function store(Request $request, $locale)
    {
        DB::table('contact')->insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'text' => $request->text,
                'readed' => false,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        $email = DB::table('emails')->where('email', $request->email)->where('type', 'contact')->exists();

        if (!$email) {
            DB::table('emails')->insert(
                [
                    'email' => $request->email,
                    'type' => 'contact',
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ]
            );
        }

        return Redirect::route("contacts");
    }

    public function destroy(string $lang, Contact $contact)
    {
        $success = $contact->delete();
        return ["success" => $success];
    }
}