<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public function classes(){
        return $this->belongsToMany(Classes::class,'class_student')
            ->withTimestamps()
            ->withPivot('nameOfConnection');
    }
}
