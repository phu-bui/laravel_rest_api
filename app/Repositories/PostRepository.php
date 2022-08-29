<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Models\Post;
use App\Repositories\Interface\PostRepositoryInterface;

class PostRepository
{
    private Post $post;
    public function __construct(Post $post) 
    {
        $this->post = $post;
    }

    public function getAllPost()
    {
        return $this->post->all();
    }

    public function getPostById($postId)
    {
        return $this->post->findOrFail($postId);
    }

    public function getPublishedPosts()
    {
        return $this->post->where('is_published', true)->get();
    }

    public function createPost(Request $storePostRequest)
    {
        
        return $this->post->create($storePostRequest->toArray());
    }

    public function updatePost($postId, Request $updatePostRequest)
    {
        $post = $this->post->find($postId);
        if($post) {
            $post->update($updatePostRequest->toArray());
        }
    }


    public function deletePost($postId)
    {
        $this->post->destroy($postId);
    }
}
