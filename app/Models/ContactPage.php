<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'contact_info', 'social_links', 'faq'
    ];

    protected $casts = [
        'contact_info' => 'array',
        'social_links' => 'array',
        'faq' => 'array',
    ];
}
