<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactHero extends Model
{
    protected $table = 'contact_hero';
    
    protected $fillable = [
        'heading',
        'description',
        'background_image'
    ];
}
