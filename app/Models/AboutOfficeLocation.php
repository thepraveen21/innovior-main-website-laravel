<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutOfficeLocation extends Model
{
    protected $table = 'about_office_locations';

    protected $fillable = [
        'about_offices_id',
        'icon',
        'title',
        'role',
        'address',
        'description',
        'contact1_icon',
        'contact1_text',
        'contact2_icon',
        'contact2_text',
        'order',
    ];

    public function offices(): BelongsTo
    {
        return $this->belongsTo(AboutOffices::class);
    }
}
