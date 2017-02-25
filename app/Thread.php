<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
