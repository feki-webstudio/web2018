<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::get();

        return view('blogpost_list', ['posts' => $posts]);
    }

    public function create()
    {
        return view ('blogpost', ['post' => new BlogPost()]);
    }

    public function store(Request $request)
    {
        $post = new BlogPost($request->all());
        $post->save();

        return redirect('/blog');
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('blogpost', ['post' => $post]);
    }

    public function update($id, Request $request)
    {
        $post = BlogPost::findOrFail($id);
        $post->fill($request->all());
        $post->save();

        return redirect('/blog');
    }

}
