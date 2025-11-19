<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_subtitle', 
        'about_text',
        'about_image',
        'vision',
        'mission',
        'capacity', 
        'established_year',
        'activities',
        'public_access',
        'address',
        'google_maps_url',
        'whatsapp_number'
    ];

    protected $casts = [
        'mission' => 'array'
    ];
}