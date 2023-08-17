<?php

namespace App\Http\Controllers;

use App\Actions\Posts\DeletePost;
use App\Actions\Posts\GetPost;
use App\Actions\Posts\GetPosts;
use App\Actions\Posts\StorePost;
use App\Actions\Posts\UpdatePost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, StorePost $storePost)
    {
        $request->validate([
            "post" => "required|string"
        ]);

        return $storePost->handle($request);
    }

    public function show(Request $request, GetPost $getPost)
    {
        $request->validate([
            "id" => "required|exists:posts"
        ]);

        return $getPost->handle($request);
    }

    public function update(Request $request, UpdatePost $updatePost)
    {
        $request->validate([
            "id" => "required|exists:posts",
            "post" => "required|string"
        ]);
        return $updatePost->handle($request);
    }

    public function delete(Request $request, DeletePost $deletePost)
    {
        return $deletePost->handle($request);
    }

    public function list(Request $request, GetPosts $getPosts)
    {
        $request->validate([
            "user_id" => "nullable|exists:users,id"
        ]);
        return $getPosts->handle($request->user_id);
    }
}
