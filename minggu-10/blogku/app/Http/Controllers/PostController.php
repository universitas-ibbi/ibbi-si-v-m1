<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view("blog.index", [
            "posts" => \App\Models\Post::where("author_id", \Auth::id())->get()
            // "SELECT * FROM tblpost WHERE author_id = 1"
        ]);
    }

    public function simpan(Request $request)
    {
        $post = new \App\Models\Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_id = \Auth::id();
        $post->save();

        return redirect("/");
    }

    public function show($id)
    {
        return view("blog.show", [
            "post" => \App\Models\Post::find($id)
        ]);
    }

    public function edit($id)
    {
        return view("blog.edit", [
            "post" => \App\Models\Post::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = \App\Models\Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect("/");
    }
}
