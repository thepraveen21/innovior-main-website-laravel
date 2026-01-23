<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMvv extends Model
{
    protected $table = 'about_mvv';

    protected $fillable = [
        'mission_title',
        'mission_description',
        'mission_icon',
        'vision_title',
        'vision_description',
        'vision_icon',
        'values_title',
        'values_description',
        'values_icon',
    ];
}
