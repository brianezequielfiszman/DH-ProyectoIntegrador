<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
