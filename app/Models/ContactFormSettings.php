<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactFormSettings extends Model
{
    protected $table = 'contact_form_settings';
    
    protected $fillable = [
        'heading',
        'submit_button_text',
        'success_message'
    ];
}
