<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_info';
    
    protected $fillable = [
        'heading',
        'description'
    ];
    
    public function cards()
    {
        return $this->hasMany(ContactInfoCard::class);
    }
}
