<?php

namespace App\Interface;

interface PostInterface
{
    public function getAllPosts();

    public function getPostById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function deletePost($id);
}
