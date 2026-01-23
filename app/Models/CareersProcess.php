<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareersProcess extends Model
{
    use HasFactory;

    protected $table = 'careers_process';

    protected $fillable = [
        'heading',
    ];
}
