<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promotion extends Model
{
    protected $table = "promotion";

    protected $fillable = [
        'title_es', 'title_en', 'text_es', 'text_en', 'link', 'image_lg', 'image_ms','image_sm','updated_at'
    ];

    public function getImageLgPathAttribute()
    {
        if ($this->image_lg)
            return Storage::url("{$this->image_lg}");

        return null;
    }

    public function getImageMdPathAttribute()
    {
        if ($this->image_md)
            return Storage::url("{$this->image_md}");

        return null;
    }
    public function getImageSmPathAttribute()
    {
        if ($this->image_sm)
            return Storage::url("{$this->image_sm}");

        return null;
    }

    //protected $guarded = [];
}
