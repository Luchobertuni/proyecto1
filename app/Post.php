<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Post extends Model
{
  protected $SoftDelete = true;
  protected $fillable = [
      'lugar','transporte', 'duracion', 'presupuesto', 'comentarios',
  ];
  public $timestamps = false;

  public function user() {
    return $this->belongsTo('\App\User', 'id', 'id');
}
}
