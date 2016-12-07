<?php

namespace Manija;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
      'message', 'user_origin_id', 'user_recipient_id', 'reply_id'
  ];

  public function user(){
      return $this->belongsTo('Manija\User', 'user_origin_id')->orWhere('Manija\User', 'user_recipient_id');
  }

  public function reply() {
    return $this->belongsTo('Manija\Reply', 'reply_id');
  }

  public function origin(){
      return $this->belongsTo('Manija\User', 'user_origin_id');
  }

  public function recipient(){
      return $this->belongsTo('Manija\User', 'user_recipient_id');
  }
}
