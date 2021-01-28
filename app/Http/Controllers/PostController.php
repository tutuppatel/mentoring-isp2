<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('posts.index', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 20);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->title = $data["title"];
        $post->detail = $data["detail"];
        $post->category = $data["category"];
        // Attach post to user
        $post->user_id = $request->user()->id;
        // End Attach post to user
    
        Project::create($post);

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
        return redirect()->route('posts.index')->with('success', 'Post created successfully. It will be reviewed and published in no time.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $author =  User::find($post->user_id);
        $post_id = $post->id;
        $comments = Comment::latest()->where('post_id', "=", $post_id)->paginate(5);
        foreach ($comments as $comment) {
            $comment->comment = $comment->comment;
            $commentor =  User::find($comment->user_id);
            $comment->author = $commentor->name;
            $comment->avatar = $commentor->avatar;
        }
        return view('posts.show', compact('post', 'author', 'comments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->title = $data["title"];
        $post->detail = $data["detail"];
        $post->category = $data["category"];
        $post->update();
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
