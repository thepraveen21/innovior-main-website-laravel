<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLatestSection extends Model
{
    use HasFactory;

    protected $table = 'news_latest_section';

    protected $fillable = [
        'heading',
        'description',
    ];
}
