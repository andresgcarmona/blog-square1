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
            // Get user.
            $user = auth('api')->user();

            // Get sort
            $sort = $request->get('sortedBy');

            $posts = Post::with('author');
//                       ->where('user_id', $user->id)

            foreach(json_decode($sort, true, 512, JSON_THROW_ON_ERROR) as $field => $order) {
                $posts->orderBy($field, $order ? 'asc' : 'desc');
            }

            return new PostsResourceCollection($posts->paginate());
        }
    }
