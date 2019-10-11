<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AdvanceSearchResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use WebDevEtc\BlogEtc\Models\BlogEtcPost;

class AdvanceSearchController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array('name'=>'kmilo'), 200);
    }


    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postbyyear(Request $request)
    {
        $year  = $request->input('year', Carbon::now()->year);

        $posts = BlogEtcPost::whereYear('created_at', $year)
            ->get();

        $data = AdvanceSearchResource::collection($posts);

        $respost = array( array('year' => $year, 'value' => $data), array('year' => $year-1, 'value' => null), array('year' => $year-2, 'value' => null) );
        $res = array( 'posts' => $respost, 'year_selected' => $year );

//        $res = array('year' => $year, 'value' => $data, 'year' => $year-1 => array(), $year-2 => array());

        return $this->respondCreated('', $res);
    }
}
