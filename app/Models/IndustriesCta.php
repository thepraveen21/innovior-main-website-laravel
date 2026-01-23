<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustriesCta extends Model
{
    protected $table = 'industries_cta';
    
    protected $fillable = [
        'heading',
        'description',
        'button_text',
        'button_link',
    ];
}
