<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('posts.create');
    }

    public function save(Request $request){
        $this->validate($request,[
            'title' => 'required|max:255',
            'body'  => 'required'
        ]);

        $post = new Post;

        $post->title=$request->title;
        $post->type=$request->type;
        $post->body=$request->body;
        $post->save();

        Session::flash('success', 'The blog post was successfully saved!');

        return redirect()->route('post.view',$post->id);
    }

    public function view(Post $post){
        return view('posts.view',['post' => $post ]);
    }

    public function delete(Post $post){
        $post->delete();
        dd($post);
    }
}