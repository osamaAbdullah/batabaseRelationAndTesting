@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p class="lead">{!! $post->body !!}</p>

            <div class="col-md-6">

                {{-- default http request
                 <form method="post" action="{{route('addComment')}}">
                       <input type="text" name="comment"  class="form-control">
                       <input type="hidden" name="post_id" id="id" value="{{$post->id}}">
                       {{csrf_field()}}
                       <button class="btn btn-success">save</button>
                   </form>--}}

                <form>
                    <input type="text" id="comment" class="form-control">
                    <input type="hidden" id="id" value="{{$post->id}}">
                    {{csrf_field()}}
                </form>
            </div>
            <hr>

            <div class="col-md-2">
                <div class="btn btn-success" id="submit">save</div>
                <a class="btn btn-primary" href="{{route('viewPostWithComments',$post->id)}}">show comments</a>
                <a class="btn btn-danger" href="{{route('post.delete',$post->id)}}">delete</a>
            </div>
            <div id="comments_div">
                hhhhhhhhhhhhhhhhhh
            </div>
        </div>
        <hr>

        <div class="col-md-4">
            <div class="well">


                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('post.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['post.delete', $post->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('post.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var url = "{{route('addComment')}}", token = '{{Session::token()}}';

        $('#submit').click(function () {
            $.ajax({
                method: 'post',
                url: url,
                data: {comment: $('#comment').val(), post_id: $('#id').val() , _token: token}
            }).done(function (m) {
                var comments = m['comments'];
                var commentsTemplate='';
                for (var i=0 ; i < comments.length ; i++)
                {
                    commentsTemplate += '<h4>'+comments[i]['value']+'</h4>'
                }
                $('#comments_div').html(commentsTemplate);
            });
        });
    </script>
@endsection