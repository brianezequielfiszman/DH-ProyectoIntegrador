<?php

namespace Manija;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
  protected $fillable = [
      'content', 'title'
  ];

  public $timestamps = false;
}
