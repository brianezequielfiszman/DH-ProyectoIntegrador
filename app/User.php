<?php

namespace Manija;

use Manija\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function category(){
        return $this->belongsTo('\Manija\Category', 'category_id');
    }

    public function messages(){
        return $this->hasMany('Manija\Message', 'user_origin_id')->orWhere('user_recipient_id', $this->id);
    }
}
