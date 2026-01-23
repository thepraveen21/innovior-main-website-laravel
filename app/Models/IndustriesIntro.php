<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustriesIntro extends Model
{
    protected $table = 'industries_intro';
    
    protected $fillable = [
        'heading',
        'description',
        'stat_1_number',
        'stat_1_label',
        'stat_2_number',
        'stat_2_label',
    ];
}
