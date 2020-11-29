<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

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
            $user = auth()->user();

            if (!$post->is_published && (!$user || $post->user->id !== $user->id)) {
                return abort(Response::HTTP_NOT_FOUND);
            }

            return view('posts.show', compact(
                'post'
            ));
        }
    }
