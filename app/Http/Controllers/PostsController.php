<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function createPosts(Request $request){
        $post = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        
        $post['title'] = strip_tags($post['title']);
        $post['content'] = strip_tags($post['content']);
        $post['user_id'] = auth()->id();
        Post::create($post);
        return redirect('/');
    }

    public function editPostScreen(Post $post){
        if($post->user_id != auth()->id()){
            return redirect('/');
        }
        return view('editPost', ['post' => $post]);
    }

    public function updateEditPostScreen(Request $request, Post $post){
        if($post->user_id != auth()->id()){
            return redirect('/');
        }

        $postField = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $postField['title'] = strip_tags($postField['title']);
        $postField['content'] = strip_tags($postField['content']);
        $post->update($postField);
        return redirect('/');
    }

    public function deletePost(Post $post){
        if($post->user_id === auth()->id()){
            $post->delete();
        }
        return redirect('/');
    }
}
