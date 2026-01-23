<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfoCard extends Model
{
    protected $fillable = [
        'title',
        'content',
        'icon_color',
        'order'
    ];
}
