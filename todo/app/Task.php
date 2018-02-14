<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    function user() {
    	return $this->belongsTo('App\User');
    }

    function comment() {
    	return $this->hasMany('App\Comment');
    }
}
