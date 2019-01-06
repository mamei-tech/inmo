<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';

    protected $fillable = [
        'email', 'type', 'element_downloaded','updated_at'
    ];
}
