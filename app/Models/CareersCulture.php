<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareersCulture extends Model
{
    use HasFactory;

    protected $table = 'careers_culture';

    protected $fillable = [
        'heading',
        'description',
    ];
}
