<?php

namespace App\Http\Controllers;


use App\Contact;
use App\Profile;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

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
        $data = ["name"=>"","email"=>"","phone"=>"","text"=>"","t_name"=>"","testimonials"=>""];
        return view('contacts', compact(["profile", "testimonials","data"]));
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
            $column = "created_at";
            $direction = "desc";

            if ($request->sort)
            {
                $sort = explode('~', $request->sort);
                $last = collect($sort)->last();

                $last = collect(explode('-', $last));
                $column = $last->first();
                $direction = $last->last();
            }

            $data = DB::table('contact')
                ->orderBy($column, $direction)
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
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'recaptcha',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', $validator->errors()->getMessages()['g-recaptcha-response'][0]);
            $testimonials = DB::table('testimonials')
                ->orderBy("created_at", "desc")
                ->take(10)
                ->get();

            $profile = Profile::query()->first();
            $data = ["name"=>$request->name,"t_name"=>"","email"=>$request->email,"phone"=>$request->phone,"text"=>$request->text, "testimonials"=>""];
            return view('contacts', compact(["profile", "testimonials","data"]));
        }
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

        //return view("emails.contacts", ["name" => $request->name, "email" => $request->email, "phone" => $request->phone, "text" => $request->text]);
        Mail::send("emails.contacts", ["name" => $request->name, "email" => $request->email, "phone" => $request->phone, "text" => $request->text],
            function ($m) use ($request) {
            $m->from(env("MAIL_NOREPLY_ADDRESS"), env("MAIL_NOREPLY_NAME"));
            $m->to("jehidalgorealestate@gmail.com")->subject(__('app.new_contact'));
        });

        $request->session()->flash('status', __('app.success_message_send'));
        return Redirect::route("contacts", [$locale]);
    }

    public function destroy(string $lang, Contact $contact)
    {
        $success = $contact->delete();
        return ["success" => $success];
    }

    public function checkNotifications(Request $request){
        $count = DB::table('contact')->where('readed', false)->count();
        return ["success" => true, "count" => $count];
    }

    public function changeNotificationsToReaded(Request $request){

        $contact = DB::table('contact')->where('id', $request->id)
            ->update(['readed' => true]);

        return ["success" => $contact];


    }
}