<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $table = "testimonials";

    protected $fillable = [
        'name', 'testimonials', 'foto', 'updated_at'
    ];
}