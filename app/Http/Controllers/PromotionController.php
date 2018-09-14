<?php

namespace App\Http\Controllers;

use App\Promotion;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PromotionController extends Controller
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
        return view('Admin.Promotion.index');
    }

    public function create(Request $request)
    {
        return view('Admin.Promotion.create', ["type"=>$request->type]);
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
        DB::table('Promotion')->insert(
            [
                'title_es' => $request->title_es,
                'title_en' => $request->title_en,
                'text_es' => $request->text_es,
                'text_en' => $request->text_en,
                'link' => $request->link,
                'image' => $request->image,
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
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
