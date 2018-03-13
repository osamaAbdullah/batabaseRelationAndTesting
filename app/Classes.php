<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

   public function students (){
       return $this->belongsToMany(Student::class,'class_student')
           ->withTimestamps()
           ->withPivot('nameOfConnection');
   }
}
