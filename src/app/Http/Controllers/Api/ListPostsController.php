<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Post;
    use Illuminate\Contracts\Pagination\LengthAwarePaginator;
    use Illuminate\Http\Request;

    class ListPostsController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Request  $request
         * @return LengthAwarePaginator
         */
        public function __invoke(Request $request)
        {
            return Post::with('author')->paginate();
        }
    }
