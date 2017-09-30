<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $fillable = ['title', 'body', 'user_id', 'last_user_id'];

    /*
        获取帖子发布者
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
