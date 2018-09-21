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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return [
            "Count" => DB::table('slider')->count(),
            "Data" => DB::table('slider')
                ->orderBy("created_at", "desc")
                ->skip(($request->page - 1) * $request->pageSize)
                ->take($request->pageSize)
                ->get()
        ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        $path = null;
        $path = $request->file('image')->store('public/slider');

        DB::table('Slider')->insert(
            [
                'title_es' => $request->title_es,
                'title_en' => $request->title_en,
                'subtitle_es' => $request->subtitle_es,
                'subtitle_en' => $request->subtitle_en,
                'image' => $path ? $path : null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        return Redirect::route("slider.index", [$locale]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(string $lang, Slider $slider)
    {
        return view('Admin.Slider.edit', ["slider" => $slider]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $lang, Slider $slider)
    {
        $path = null;

        $uploadedImage = $request->file('image');
        if($uploadedImage){
            Storage::delete($slider->image);
            $path = $uploadedImage->store('public/slider');
        }


        $slider->fill([
            'title_es' => $request->title_es,
            'title_en' => $request->title_en,
            'text_es' => $request->subtitle_es,
            'text_en' => $request->subtitle_en,
            'image' => $path ? $path : $slider->image,
            'updated_at' => new DateTime()
        ]);
        $slider->save();

        return Redirect::route("slider.index", [$lang]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion $promotion
     * @return array
     * @throws Exception
     */
    public function destroy(string $lang, Slider $slider)
    {
        $success = $slider->delete();
        if ($success)
            Storage::delete($slider->image);
        return ["success" => $success];
    }
}
