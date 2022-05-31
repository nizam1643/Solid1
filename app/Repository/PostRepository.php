<?php

namespace App\Repository;

use App\Interface\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{
    protected $post = null;

    public function getAllPosts()
    {
        return Post::get();
    }

    public function getPostById($id)
    {
        return Post::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {
        if(is_null($id)) {
            $post = new Post;
            $post->title = $collection['title'];
            $post->content = $collection['content'];
            return $post->save();
        }
        $post = Post::find($id);
        $post->title = $collection['title'];
            $post->content = $collection['content'];
        return $post->save();
    }

    public function deletePost($id)
    {
        return Post::find($id)->delete();
    }
}
