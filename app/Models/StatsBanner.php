<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatsBanner extends Model
{
    protected $table = 'stats_banner';
    
    protected $fillable = [
        'number',
        'label',
        'order',
    ];
}
