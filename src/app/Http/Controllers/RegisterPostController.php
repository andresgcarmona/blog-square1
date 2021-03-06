<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class RegisterPostController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Request  $request
         * @return Application|Factory|View|Response
         */
        public function __invoke(Request $request)
        {
            $post = new Post();

            return view('posts.register', compact('post'));
        }
    }
