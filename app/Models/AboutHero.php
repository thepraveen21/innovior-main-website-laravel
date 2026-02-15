<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutHero extends Model
{
    protected $table = 'about_hero';

    protected $fillable = [
        'subtitle',
        'heading',
        'description',
        'hero_image',
    ];
}
