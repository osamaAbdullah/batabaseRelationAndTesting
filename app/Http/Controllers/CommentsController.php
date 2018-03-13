<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function save(Request $request)
    {
   /*     //saving in database responding to http request
        $comment = new Comment;
        $comment->value = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();



        return redirect()->back();*/


        //saving in database responding to ajax request
        $comment = new Comment;
        $comment->value = $request->comment;
        //$comment->post_id = $request->post_id;
        $comment->post()->associate($request->post_id);
        $comment->save();


        $post = Post::find($request->post_id);
//        //$post->comments()->save($comment);
//
//        $post->comments()->create([
//            'value' => $request->comment,
//            'post_id' => $request->post_id
//        ]);

//            Comment::create([
//            'value' => $request->comment,
//            'post_id' => $request->post_id
//        ]);

        return response()->json(['comments' => $post->comments]);
    }

    public function view($id)
    {
        $post = Post::find($id);
        return view('posts.postWithComments',['post'=>$post]);
    }
}
