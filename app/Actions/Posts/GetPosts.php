<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Exception;

class GetPosts
{

    public function handle($userId = null)
    {
        try {
            return Post::when(!is_null($userId), fn ($q) => $q->where("user_id", $userId))
                ->withCount(["comments", "likes"])->get();
        } catch (Exception $exception) {
            return response([
                "message" => "Something went wrong."
            ], 500);
        }
    }
}
