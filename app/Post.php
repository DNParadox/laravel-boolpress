<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'cover'
    ];

    public function category() {
        // Se volessimo dare un altro nome , segnalare come
        //  seconda identità fra parentesi il nome scelto
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
