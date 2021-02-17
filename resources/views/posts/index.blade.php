@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}" style="background-color:#4B94FD; border: 0;"> Create New Post</a>
            </div><br><br>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @foreach ($posts as $post)
        <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5> <a href="{{ route('posts.show',$post->id) }}"class="font-weight-bold mb-3"> Title: {{ $post->title }}</a> </h5>
                    <p class="mb-0">Description: {{ $post->detail }}</p>
                <div class="card-body">
                    <a href="{{ route('posts.show',$post->id) }}" class="card-link">View</a>
                </div>
        </div><br>
    @endforeach
    {!! $posts->links() !!}
    </div>
@endsection