<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;

    class ShowPostController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Post  $post
         * @param  Request  $request
         * @return Application|Factory|View|void
         */
        public function __invoke(Post $post, Request $request)
        {
            return view('posts.show', compact(
                'post'
            ));
        }
    }
