<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareersWhySection extends Model
{
    use HasFactory;

    protected $table = 'careers_why_section';

    protected $fillable = [
        'heading',
    ];
}
