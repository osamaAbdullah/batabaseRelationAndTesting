@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
                @foreach($post->comments as $comment)
                    <h4>{{$comment->value}}</h4>
                @endforeach
            </div>
        </div>
    </div>
@endsection
