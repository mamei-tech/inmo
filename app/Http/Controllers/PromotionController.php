<?php

namespace App\Http\Controllers;

use App\Promotion;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    protected $promotions;

    public function __construct(Promotion $promotions)
    {
        $this->promotions = $promotions;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Promotion.index');
    }

    public function create(Request $request)
    {
        return view('Admin.Promotion.create', ["type" => $request->type]);
    }

    public function readMain(Request $request)
    {
        return [
            "Count" => DB::table('Promotion')->whereNotNull("image")->count(),
            "Data" => DB::table('Promotion')
                ->whereNotNull("image")
                ->orderBy("created_at", "desc")
                ->skip(($request->page - 1) * $request->pageSize)
                ->take($request->pageSize)
                ->get()
        ];
    }

    public function read(Request $request)
    {
        return [
            "Count" => DB::table('Promotion')->whereNull("image")->count(),
            "Data" => DB::table('Promotion')
                ->whereNull("image")
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
        if ($request->type == "main")
            $path = $request->file('image')->store('public/promotions');

        DB::table('Promotion')->insert(
            [
                'title_es' => $request->title_es,
                'title_en' => $request->title_en,
                'text_es' => $request->text_es,
                'text_en' => $request->text_en,
                'link' => $request->link,
                'image' => $path ? $path : null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        return Redirect::route("promotion.index", [$locale]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(string $lang, Promotion $promotion)
    {
        $type = $promotion->image ? "main" : "second" ;
        return view('Admin.Promotion.edit', ["type" => $type, "promotion" => $promotion]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $lang, Promotion $promotion)
    {
        $path = null;
        if ($request->type == "main")
        {
            $uploadedImage = $request->file('image');
            if($uploadedImage){
                Storage::delete($promotion->image);
                $path = $uploadedImage->store('public/promotions');
            }
        }

        $promotion->fill([
            'title_es' => $request->title_es,
            'title_en' => $request->title_en,
            'text_es' => $request->text_es,
            'text_en' => $request->text_en,
            'link' => $request->link,
            'image' => $path ? $path : $promotion->image,
            'updated_at' => new DateTime()
        ]);
        $promotion->save();

        return Redirect::route("promotion.index", [$lang]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion $promotion
     * @return array
     * @throws Exception
     */
    public function destroy(string $lang, Promotion $promotion)
    {
        $success = $promotion->delete();
        if ($success)
            Storage::delete($promotion->image);
        return ["success" => $success];
    }
}
