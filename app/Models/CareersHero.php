<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareersHero extends Model
{
    use HasFactory;

    protected $table = 'careers_hero';

    protected $fillable = [
        'tag',
        'heading',
        'description',
        'button_text',
        'button_link',
    ];
}
