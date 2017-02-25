<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';


    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function replyTo()
    {
        return $this->hasOne('App\Comments');
    }
}
