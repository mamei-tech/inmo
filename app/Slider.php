<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $table = "slider";

    protected $fillable = [
        'title_es', 'title_en', 'subtitle_es', 'subtitle_en', 'image', 'updated_at'
    ];

    public function getImagePathAttribute()
    {
        return Storage::url("{$this->image}");
    }
}
