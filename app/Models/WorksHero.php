<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorksHero extends Model
{
    protected $table = 'works_hero';

    protected $fillable = [
        'heading',
        'description',
        'background_image',
    ];
}
