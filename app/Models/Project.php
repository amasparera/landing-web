<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'cover',
        'about',
        'category',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];
}
