@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::script('js/parsley.min.js') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            <form method="post" action="{{route('post.save')}}" data-parsley-validate>

                {{csrf_field()}}

                <label>Title</label>
                <input type="text" name="title" class="form-control" required maxlength="255">

                <label>Type</label>
                <input type="text" name="type" class="form-control" maxlength="255">

                <label>Body</label>
                <textarea class="form-control" name="body" cols="50" rows="10" required maxlength="255"></textarea>

                <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block" style="margin-top: 20px">
            </form>
        </div>
    </div>

@endsection

