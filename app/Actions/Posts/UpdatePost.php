<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Exception;

class UpdatePost
{

    public function handle($request)
    {
        try {

            $post = Post::find($request->id);
            $post->update([
                "post" => $request->post
            ]);
            return response([
                "message" => "Post updated successfully.",
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
