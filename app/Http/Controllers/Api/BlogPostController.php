<?php

namespace App\Http\Controllers\Api;

use App\BlogPost;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BlogPost
            ::latest()
            ->published()
            ->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:blog_posts|max:255',
            'intro' => 'required',
        ]);

        $post = new BlogPost($request->all());

        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BlogPost::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $post->fill($request->all());
        $post->save();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogPost::destroy($id);
    }

    public function storeComment(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'blog_post_id' => 'required|exists:blog_posts,id',
        ]);

        $comment = new Comment($request->all());

        $comment->save();

        return $comment;
    }
}
