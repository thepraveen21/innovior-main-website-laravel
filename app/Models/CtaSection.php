<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CtaSection extends Model
{
    protected $table = 'cta_section';
    
    protected $fillable = [
        'heading',
        'description',
        'button_text',
        'button_link',
    ];
}
