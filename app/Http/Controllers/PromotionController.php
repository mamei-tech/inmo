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
        return view('admin.promotion.index');
    }

    public function create(Request $request)
    {
        return view('admin.promotion.create', ["type" => $request->type]);
    }

    public function readMain(Request $request)
    {
        $count = DB::table('promotion')->whereNotNull("image_lg")->count();
        $data = [];

        if ($count){
            $data = DB::table('promotion')
                ->whereNotNull("image_lg")
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

    public function read(Request $request)
    {
        $count = DB::table('promotion')->whereNull("image_lg")->count();
        $data = [];

        if ($count){
            $data = DB::table('promotion')
                ->whereNull("image_lg")
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        $path_lg = null;
        $path_md = null;
        $path_sm = null;
        if ($request->type == "main")
        {
            $path_lg = $request->file('image')->store('public/promotions/lg');
            $path_md = $request->file('image')->store('public/promotions/md');
            $path_sm = $request->file('image')->store('public/promotions/sm');
        }


        DB::table('promotion')->insert(
            [
                'title_es' => $request->title_es,
                'title_en' => $request->title_en,
                'text_es' => $request->text_es,
                'text_en' => $request->text_en,
                'link' => $request->link,
                'image_lg' => $path_lg ? $path_lg : null,
                'image_md' => $path_md ? $path_md : null,
                'image_sm' => $path_sm ? $path_sm : null,
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
        $type = $promotion->image_lg ? "main" : "second" ;
        return view('admin.promotion.edit', ["type" => $type, "promotion" => $promotion]);
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
        $path_lg = null;
        $path_md = null;
        $path_sm = null;

        if ($request->type == "main")
        {
            $uploadedImageLg = $request->file('image_lg');
            if($uploadedImageLg){
                Storage::delete($promotion->image_lg);
                $path_lg = $uploadedImageLg->store('public/promotions/lg');
            }

            $uploadedImageMd = $request->file('image_md');
            if($uploadedImageMd){
                Storage::delete($promotion->image_md);
                $path_md = $uploadedImageMd->store('public/promotions/md');
            }

            $uploadedImageSm = $request->file('image_sm');
            if($uploadedImageSm){
                Storage::delete($promotion->image_sm);
                $path_sm = $uploadedImageSm->store('public/promotions/sm');
            }
        }

        $promotion->fill([
            'title_es' => $request->title_es,
            'title_en' => $request->title_en,
            'text_es' => $request->text_es,
            'text_en' => $request->text_en,
            'link' => $request->link,
            'image_lg' => $path_lg ? $path_lg : $promotion->image_lg,
            'image_md' => $path_md ? $path_md : $promotion->image_md,
            'image_sm' => $path_sm ? $path_sm : $promotion->image_sm,
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
        {
            Storage::delete($promotion->image_lg);
            Storage::delete($promotion->image_md);
            Storage::delete($promotion->image_sm);
        }

        return ["success" => $success];
    }
}
