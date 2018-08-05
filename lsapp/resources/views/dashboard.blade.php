@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div>
                        <a class="btn btn-primary" href="/posts/create">Create Post</a>
                        &NonBreakingSpace;
                        <hr>
                    </div>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts)>0)
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @if(is_array($posts) || is_object($posts))
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            @else
                            <p>You have no posts</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
