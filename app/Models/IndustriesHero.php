<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustriesHero extends Model
{
    protected $table = 'industries_hero';
    
    protected $fillable = [
        'badge',
        'heading',
        'description',
        'hero_image',
    ];
}
