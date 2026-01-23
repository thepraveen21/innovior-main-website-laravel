<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHero extends Model
{
    use HasFactory;

    protected $table = 'news_hero';

    protected $fillable = [
        'heading',
        'description',
        'background_image',
    ];
}
