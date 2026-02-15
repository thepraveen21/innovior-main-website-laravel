<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footers';

    protected $fillable = [
        'company_name',
        'company_description',
        'facebook_url',
        'linkedin_url',
        'instagram_url',
        'address',
        'phone',
        'email',
        'copyright_text',
    ];
}
