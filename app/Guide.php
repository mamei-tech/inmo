<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Guide extends Model
{
    protected $table = "guides";

    protected $fillable = [
       'text_es', 'text_en', 'file', 'updated_at'
    ];

    public function getGuidePathAttribute()
    {
        if ($this->guide)
            return Storage::url("{$this->guide}");

        return null;
    }
}
