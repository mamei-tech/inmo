<?php

namespace App\Http\Controllers;

use App\Guide;
use DateTime;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class GuideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'sendEmail']);
    }

    public function index()
    {
        $guides = Guide::query()->orderBy("created_at")->get();
        return view('guides', ['guides' => $guides]);
    }

    public function indexAdmin()
    {
        return view('admin.guide.index');
    }

    public function sendEmail(Request $request, $locale)
    {
        $selected = $request->guides;
        if(!$selected)
            return ["success"=>false, "message"=>__('app.selected_some_guide')];

        $guides = Guide::query()->whereIn("id", $selected?$selected:[])->get();

        DB::table('emails')->insert(
            [
                'email' => $request->email,
                'type' => 'guide',
                'element_downloaded' => $guides->implode(App::getLocale()=="es"? 'text_es' : 'text_en', ', '),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Mail::send("emails.guides_admin", ["guides" => $guides, "email" => $request->email], function ($m) use ($request) {
            $m->from(env("MAIL_NOREPLY_ADDRESS"), env("MAIL_NOREPLY_NAME"));
            $m->to("jehidalgorealestate@gmail.com")->subject(__('app.new_download'));
        });

        Mail::send("emails.guides", ["guides" => $guides], function ($m) use ($request) {
            $m->from(env("MAIL_NOREPLY_ADDRESS"), env("MAIL_NOREPLY_NAME"));
            $m->to($request->email)->subject(__('app.download_guides'));
        });

        //return view("emails.guides", ["guides" => $guides]);
        return ["success"=>true, "message"=>__('app.check_email')];
    }

    public function read(Request $request)
    {
        $count = DB::table('guides')->count();
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

            $data = DB::table('guides')
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

    public function create()
    {
        return view('admin.guide.create');
    }

    public function store(Request $request, $locale)
    {
        $path_es = $request->file('guideEs')->store('public/guides');
        $path_en = $request->file('guideEn')->store('public/guides');
        $path_image = $request->file('image')->store('public/guides');

        DB::table('guides')->insert(
            [
                'text_es' => $request->text_es,
                'text_en' => $request->text_en,
                'guide_es' => $path_es,
                'guide_en' => $path_en,
                'image' => $path_image,
                'description_en' => $request->description_en,
                'description_es' => $request->description_es,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        return Redirect::route("guide.index_admin", [$locale]);
    }

    public function destroy(string $lang, Guide $guide)
    {
        $success = $guide->delete();
        if ($success)
        {
            Storage::delete($guide->guide_es);
            Storage::delete($guide->guide_en);
            Storage::delete($guide->image);
        }

        return ["success" => $success];
    }

    public function edit(string $lang, Guide $guide)
    {
        return view('admin.guide.edit', ["guide" => $guide]);
    }

    public function update(Request $request, string $lang, Guide $guide)
    {
        $path_es = null;
        $path_en = null;
        $path_image = null;

        $uploadedImage = $request->file('guide_es');
        if ($uploadedImage) {
            Storage::delete($guide->guide_es);
            $path_es = $uploadedImage->store('public/guides');
        }

        $uploadedImage = $request->file('guide_en');
        if ($uploadedImage) {
            Storage::delete($guide->guide_en);
            $path_en = $uploadedImage->store('public/guides');
        }

        $uploadedImage = $request->file('image');
        if ($uploadedImage) {
            Storage::delete($guide->image);
            $path_image = $uploadedImage->store('public/guides');
        }

        $guide->fill([
            'text_es' => $request->text_es,
            'text_en' => $request->text_en,
            'description_en' => $request->description_en,
            'description_es' => $request->description_es,
            'guide_es' => $path_es ? $path_es : $guide->guide_es,
            'guide_en' => $path_en ? $path_en : $guide->guide_en,
            'image' => $path_image ? $path_image : $guide->image,
            'updated_at' => new DateTime()
        ]);
        $guide->save();

        return Redirect::route("guide.index_admin", [$lang]);
    }
}
