<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvanceSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $imgpath = asset('/images/blog_images/'.$this->image_medium);
        if (!isset($this->image_medium))
            $imgpath = asset('/images/blog_images/default_medium.png');

        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'post_body'         => $this->generate_introduction(460),
            'posted_at'         => humanize_date($this->posted_at, "d/m/Y"),
            'image_medium'      => $imgpath,
            'count_comments'    => $this->comments->count(),
            'url'               => $this->url(),
        ];
    }
}
