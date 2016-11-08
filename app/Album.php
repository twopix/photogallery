<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'description'
  ];


  /**
   * Album always belong to user
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
