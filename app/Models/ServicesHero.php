<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesHero extends Model
{
    protected $table = 'services_hero';
    
    protected $fillable = [
        'badge',
        'heading',
        'description',
        'hero_image',
    ];
}
