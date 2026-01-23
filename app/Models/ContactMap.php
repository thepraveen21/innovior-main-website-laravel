<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMap extends Model
{
    protected $table = 'contact_map';
    
    protected $fillable = [
        'heading',
        'map_embed_url'
    ];
}
