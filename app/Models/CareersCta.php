<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareersCta extends Model
{
    use HasFactory;

    protected $table = 'careers_cta';

    protected $fillable = [
        'heading',
        'description',
        'email',
        'button_text',
        'button_link',
    ];
}
