<?php

namespace App\Actions\Posts;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Exception;

class GetPost
{

    public function handle($request)
    {
        try {
            $post = Post::find($request->id);
            $post->load([
                "comments",
                "likes",
                "user"
            ])->loadCount([
                "comments",
                "likes"
            ]);

            //To avoid writing more quaries like there we user load or with function 
            // $cooments = Comment::where("post_id", $post->id)->get();
            // Comment::where("post_id", $post->id)->count();
            // Like::where("post_id", $post->id)->get();
            // Like::where("post_id", $post->id)->count();

            return $post;
        } catch (Exception $exception) {
            return response([
                "message" => "Something went wrong."
            ], 500);
        }
    }
}
