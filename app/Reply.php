<?php

namespace Manija;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $fillable = [
      'content'
  ];
}
