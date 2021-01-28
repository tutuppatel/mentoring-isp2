<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, $post_id)
    {
        $data = $request->validated();

        $comment = new Comment();
        $comment->comment = $data["comment"];
        // Attach comment to user
        $comment->user_id = $request->user()->id;
        // Attach comment to post
        $comment->post_id = $post_id;
        $comment->approved = true;
        $comment->save();

        return redirect()->route('posts.show', $post_id)->with('success', 'Comment added successfully.');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        $post = Post::find($post_id);
        $author_id = $post->user_id;
        $author = User::find($author_id);
        return view('comments.edit', compact('post', 'author', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $post_id = $comment->post_id;
        $this->validate($request, array('comment' => 'required'));
        $comment->comment = $request->comment;
        $comment->update();
        return redirect()->route('posts.show', $post_id)->with('success', "Comment updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect()->route('posts.show', $post_id)->with('success', 'Comment deleted successfully.');
    }


}
