<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'vision', 'mission', 'values', 'team', 'services', 'stats',
        'contact_email', 'contact_phone', 'contact_address', 'work_hours'
    ];

    protected $casts = [
        'values' => 'array',
        'services' => 'array',
        'stats' => 'array',
    ];
}
