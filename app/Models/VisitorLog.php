<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable = [
        'ip', 'country', 'city', 'user_agent', 'page', 'visited_at'
    ];
    public $timestamps = true;
} 