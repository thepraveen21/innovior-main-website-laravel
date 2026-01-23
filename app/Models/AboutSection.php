<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $table = 'about_section';
    
    protected $fillable = [
        'sub_heading',
        'heading',
        'paragraph_1',
        'paragraph_2',
        'stat_1_number',
        'stat_1_label',
        'stat_2_number',
        'stat_2_label',
        'image',
    ];
}
