<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Exception;

class DeletePost
{

    public function handle($request)
    {
        try {
            Post::destroy($request->id);
            // Post::destroy([1, 2, 3]); //To delete multiple records pass array of ids(primary key)
            // Post::where("id", $request->id)->delete();
            return response([
                "message" => "Post deleted successfully.",
            ]);
        } catch (Exception $exception) {
            return response([
                "message" => "Something went wrong."
            ], 500);
        }
    }
}
