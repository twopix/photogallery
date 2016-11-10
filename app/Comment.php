<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'owner_id', 'photo_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
