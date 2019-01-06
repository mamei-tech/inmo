<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Guide extends Model
{
    protected $table = "guides";

    protected $fillable = [
       'text_es', 'text_en', 'guide_es', 'guide_en', 'updated_at'
    ];

    public function getGuideEsPathAttribute()
    {
        if ($this->guide_es)
            return Storage::url("{$this->guide_es}");

        return null;
    }

    public function getGuideEnPathAttribute()
    {
        if ($this->guide_en)
            return Storage::url("{$this->guide_en}");

        return null;
    }
}
