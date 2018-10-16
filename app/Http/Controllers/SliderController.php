<?php

namespace App\Http\Controllers;

use App\Slider;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function read(Request $request)
    {
        $count = DB::table('slider')->count();
        $data = [];

        if ($count){
            $data = DB::table('slider')
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
        $path_lg = null;
        $path_md = null;
        $path_sm = null;
        $path_lg = $request->file('image_lg')->store('public/slider/lg');
        $path_md = $request->file('image_md')->store('public/slider/md');
        $path_sm = $request->file('image_sm')->store('public/slider/sm');

        DB::table('slider')->insert(
            [
                'title_es' => $request->title_es,
                'title_en' => $request->title_en,
                'subtitle_es' => $request->subtitle_es,
                'subtitle_en' => $request->subtitle_en,
                'image_lg' => $path_lg ? $path_lg : null,
                'image_md' => $path_md ? $path_md : null,
                'image_sm' => $path_sm ? $path_sm : null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        return Redirect::route("slider.index", [$locale]);
    }

    public function edit(string $lang, Slider $slider)
    {
        return view('admin.slider.edit', ["slider" => $slider]);
    }

    public function update(Request $request, string $lang, Slider $slider)
    {
        $path_lg = null;
        $path_md = null;
        $path_sm = null;


        $uploadedImageLg = $request->file('image_lg');
        if($uploadedImageLg){
            Storage::delete($slider->image_lg);
            $path_lg = $uploadedImageLg->store('public/slider/lg');
        }

        $uploadedImageMd = $request->file('image_md');
        if($uploadedImageMd){
            Storage::delete($slider->image_md);
            $path_md = $uploadedImageMd->store('public/slider/md');
        }

        $uploadedImageSm = $request->file('image_sm');
        if($uploadedImageSm){
            Storage::delete($slider->image_sm);
            $path_sm = $uploadedImageSm->store('public/slider/sm');
        }


        $slider->fill([
            'title_es' => $request->title_es,
            'title_en' => $request->title_en,
            'text_es' => $request->subtitle_es,
            'text_en' => $request->subtitle_en,
            'image_lg' => $path_lg ? $path_lg : $slider->image_lg,
            'image_md' => $path_md ? $path_md : $slider->image_md,
            'image_sm' => $path_sm ? $path_sm : $slider->image_sm,
            'updated_at' => new DateTime()
        ]);
        $slider->save();

        return Redirect::route("slider.index", [$lang]);
    }

    public function destroy(string $lang, Slider $slider)
    {
        $success = $slider->delete();
        if ($success){
            Storage::delete($slider->image_lg);
            Storage::delete($slider->image_md);
            Storage::delete($slider->image_sm);
        }

        return ["success" => $success];
    }
}
