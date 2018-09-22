<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promotion extends Model
{
    protected $table = "promotion";

    protected $fillable = [
        'title_es', 'title_en', 'text_es', 'text_en', 'link', 'image', 'updated_at'
    ];

    public function getImagePathAttribute()
    {
        if ($this->image)
            return Storage::url("{$this->image}");

        return null;
    }

    //protected $guarded = [];
}
