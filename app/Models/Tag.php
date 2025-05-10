<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_robots',
        'meta_canonical',
        'meta_image',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
