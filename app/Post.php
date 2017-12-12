<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'lugar','transporte', 'duracion', 'presupuesto', 'comentarios',
  ];
  public $timestamps = false;

  public function user() {
    return $this->belongsTo('\App\User', 'id', 'id');
}
}
