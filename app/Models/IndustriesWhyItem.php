<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustriesWhyItem extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'order',
    ];
}
