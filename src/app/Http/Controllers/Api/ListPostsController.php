<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Resources\PostsResourceCollection;
    use App\Models\Post;
    use Illuminate\Http\Request;

    class ListPostsController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Request  $request
         * @return PostsResourceCollection
         */
        public function __invoke(Request $request)
        {
            $user = auth('api')->user();

            $posts = Post::with('author')
//                       ->where('user_id', $user->id)
                         ->paginate();

            return new PostsResourceCollection($posts);
        }
    }
