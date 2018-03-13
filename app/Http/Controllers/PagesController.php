<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Post;
use App\Student;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

//        $students = Student::find(1);
//        //$students->classes()->attach(2,['nameOfConnection' => 'first connection']);
//
//
//
//        foreach ($students->classes as $class)
//        {
//            dd($class->pivot->nameOfConnection);
//        }




        $posts = Post::all();
        return view('pages.index')->withPosts($posts);
    }


}
