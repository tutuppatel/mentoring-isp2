<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #btn 
        {
            color:red; 
            background-color:#f3f3f3;
        }
    </style>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Title: {{ $post->title }}</h5>
                    <p class="mb-0">Description: {{ $post->detail }}</p>
                    <p class="mb-0">Category: {{ $post->category }}</p>
                    <p class="mb-0">Author: {{  $author->name  }} </p>
                    @role('administrator')
                    <p class="mb-0">Status: {{ $post->status }}</p>
                    @endrole
                </div>
                
        </div><br>
        <div class="comment-form">
                <form action="{{ route('comments.update',$comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                        <div class="col-md-12">
                            <label for="comment"><strong>Edit your comment</strong></label>
                            <textarea class="form-control" style="height:100px; width:700px;" name="comment" placeholder="Tell us what you think">{{ $comment->comment }}</textarea>
                        </div> <br>
                        <div class="col-md-12 pt-3">
                        <button type="submit" class="btn btn-primary">Edit Comment</button>
                        </div>
                </form>
            </div><br>
        
           
        </div>
        </div>
@endsection
</body>
</html>