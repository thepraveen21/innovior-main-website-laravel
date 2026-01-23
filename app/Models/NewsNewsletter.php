<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsNewsletter extends Model
{
    use HasFactory;

    protected $table = 'news_newsletter';

    protected $fillable = [
        'heading',
        'description',
        'button_text',
    ];
}
