<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request){
        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description 
        ]);

        return back();
    }

    public function show($postId) {
        
        $post = Post::findorFail($postId);

        return view('posts.show', compact('post'));
    }

    public function edit($postId){
        $post = Post::findorFail($postId);

        return view('Posts.edit', compact('post'));
    }

    public function update($postId, Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $post = Post::findOrFail($postId);
        
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
    
        return redirect(route('posts.all'));
    }

    public function delete($postId){
        Post::findOrFail($postId)->delete();

        return redirect(route('posts.all'));

    }
    
    
}
