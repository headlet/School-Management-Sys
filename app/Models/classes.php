<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
  use HasFactory;

  protected $fillable = ['class', 'section'];

  public function student(){
    return $this->belongsToMany(Student::class,'class_users', 'class_id', 'user_id' );
  }
}
