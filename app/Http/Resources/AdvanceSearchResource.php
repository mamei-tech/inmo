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
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'post_body'         => $this->post_body,
            'posted_at'         => humanize_date($this->posted_at, "d/m/Y"),
            'image_medium'      => $this->image_medium,
            'count_comments'    => $this->comments->count(),
        ];
    }
}
