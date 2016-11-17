<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
      'text', 'user_id'
  ];

  public function usuario(){
      return $this->belongsTo('App\User', 'user_id');
  }
}
