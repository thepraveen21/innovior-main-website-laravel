<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutOverview extends Model
{
    protected $table = 'about_overview';

    protected $fillable = [
        'heading',
        'description',
        'button_text',
        'button_link',
        'stat1_number',
        'stat1_label',
        'stat2_number',
        'stat2_label',
        'stat3_number',
        'stat3_label',
        'stat4_number',
        'stat4_label',
    ];
}
