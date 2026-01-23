<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustriesWhy extends Model
{
    protected $table = 'industries_why';
    
    protected $fillable = [
        'heading',
        'description',
        'image',
    ];
}
