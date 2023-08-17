<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Exception;

class StorePost
{

    public function handle($request)
    {
        try {
            $post = Post::create([
                "post" => $request->post,
                "user_id" => 1,
                // "user_id" => auth()->id(),
                // "user_id" => auth()->user()->id,
                // "user_id" => $request->user()->id
            ]);
            return response([
                "message" => "Post added successfully.",
                // "post_id" => $post->id,
                // "data" => $post
            ]);
        } catch (Exception $exception) {
            return response([
                "message" => "Something went wrong."
            ], 500);
        }
    }
}
