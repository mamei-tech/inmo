<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";

    protected $fillable = [
        'bio_es', 'bio_en','privacy_es', 'privacy_en', 'email', 'site_web', 'phone', 'address', 'link_facebook', 'link_instagram', 'link_in', 'link_youtube', 'updated_at'
    ];
}
