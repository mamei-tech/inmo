<?php

namespace App\Http\Controllers;

use App\Guide;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $guides = DB::table('guides')
            ->orderBy("created_at", "desc")
            ->get();

        return view('guides', ['guides' => $guides]);
    }

    public function sendEmail(Request $request)
    {
        return ["success" => true, "request" => $request->attributes];
    }

    public function indexAdmin()
    {
        return view('admin.guide.index');
    }

    public function read(Request $request)
    {
        return [
            "Count" => DB::table('guides')->count(),
            "Data" => DB::table('guides')
                ->orderBy("created_at", "desc")
                ->skip(($request->page - 1) * $request->pageSize)
                ->take($request->pageSize)
                ->get()
        ];
    }

    public function create()
    {
        return view('admin.guide.create');
    }

    public function store(Request $request, $locale)
    {
        $path = $request->file('guide')->store('public/guides');

        DB::table('Guides')->insert(
            [
                'text_es' => $request->text_es,
                'text_en' => $request->text_en,
                'guide' => $path,
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
            Storage::delete($guide->guide);
        return ["success" => $success];
    }

    public function edit(string $lang, Guide $guide)
    {
        return view('admin.guide.edit', ["guide" => $guide]);
    }

    public function update(Request $request, string $lang, Guide $guide)
    {
        $path = null;
        $uploadedImage = $request->file('guide');
        if($uploadedImage){
            Storage::delete($guide->guide);
            $path = $uploadedImage->store('public/guides');
        }


        $guide->fill([
            'text_es' => $request->text_es,
            'text_en' => $request->text_en,
            'guide' =>  $path ? $path : $guide->guide,
            'updated_at' => new DateTime()
        ]);
        $guide->save();

        return Redirect::route("guide.index_admin", [$lang]);
    }
}
