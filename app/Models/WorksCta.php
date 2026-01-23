<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorksCta extends Model
{
    protected $table = 'works_cta';

    protected $fillable = [
        'heading',
        'description',
        'button_text',
        'button_link',
    ];
}
