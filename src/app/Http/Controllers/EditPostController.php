<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Auth\Access\AuthorizationException;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;

    class EditPostController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Post  $post
         * @param  Request  $request
         * @return Application|Factory|View|void
         * @throws AuthorizationException
         */
        public function __invoke(Post $post, Request $request)
        {
            $this->authorize('edit', $post);

            return view('posts.edit', compact(
                'post'
            ));
        }
    }
