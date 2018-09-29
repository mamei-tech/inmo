<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $table = "slider";

    protected $fillable = [
        'title_es', 'title_en', 'subtitle_es', 'subtitle_en', 'image_lg','image_md','image_sm', 'updated_at'
    ];

    public function getImageLgPathAttribute()
    {
        return Storage::url("{$this->image_lg}");
    }

    public function getImageMdPathAttribute()
    {
        return Storage::url("{$this->image_md}");
    }

    public function getImageSmPathAttribute()
    {
        return Storage::url("{$this->image_sm}");
    }
}
