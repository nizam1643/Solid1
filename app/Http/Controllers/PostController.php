<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Interface\PostInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public $post;

    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    public function showPosts()
    {
        $posts = $this->post->getAllPosts();
        return View::make('post.index', compact('posts'));
    }

    public function createPost()
    {
        return View::make('post.edit');
    }

    public function getPost($id)
    {
        $post = $this->post->getPostById($id);
        return View::make('post.edit', compact('post'));
    }

    public function savePost(PostRequest $request, $id = null)
    {
        $collection = $request->except(['_token','_method']);

        if( ! is_null( $id ) )
        {
            $this->post->createOrUpdate($id, $collection);
        }
        else
        {
            $this->post->createOrUpdate($id = null, $collection);
        }

        return redirect()->route('post.list');
    }

    public function deletePost($id)
    {
        $this->post->deletePost($id);

        return redirect()->route('post.list');
    }
}
