<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use JavaScript;

    class IndexController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Request  $request
         * @return Application|Factory|View|Response
         */
        public function __invoke(Request $request)
        {
            $posts = Post::with('author')
                         ->published()
                         ->orderBy('published_at', 'desc')
                         ->paginate();

            $token = $request->cookie('api_token');

            JavaScript::put(compact('token'));

            return view('index', compact(
                'posts'
            ));
        }
    }
