<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSelect extends Model
{
    protected $table = 'users_selects';

    public function posts() {

        return $this->hasMany('App\Post');
    }
}
