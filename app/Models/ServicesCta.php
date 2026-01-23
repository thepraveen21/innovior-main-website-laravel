<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesCta extends Model
{
    protected $table = 'services_cta';
    
    protected $fillable = [
        'heading',
        'description',
        'button_text',
        'button_link',
    ];
}
