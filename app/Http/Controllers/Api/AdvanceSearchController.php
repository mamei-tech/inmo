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
        $yearcurrent = Carbon::now()->year;
        $year  = $request->input('year', $yearcurrent);

        $posts = BlogEtcPost::whereYear('created_at', $year)
            ->get();

        $data = AdvanceSearchResource::collection($posts);

        $respost = array( array('year' => $yearcurrent, 'value' => []), array('year' => $yearcurrent-1, 'value' => []), array('year' => $yearcurrent-2, 'value' => []) );

        foreach ($respost as &$item) {
            if ($item['year'] == $year)
                data_set($item, 'value', $data);
        }

        $res = array( 'posts' => $respost, 'year_selected' => $year );

        return $this->respondCreated('', $res);
    }
}
