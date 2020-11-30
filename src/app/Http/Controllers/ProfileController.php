<?php

    namespace App\Http\Controllers;

    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use JavaScript;

    class ProfileController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * @param  Request  $request
         * @return Application|Factory|View
         */
        public function __invoke(Request $request)
        {
            $user = auth()->user();

            $token = $request->cookie('api_token');

            JavaScript::put(compact('token'));

            return view('users.dashboard', compact(
                'user'
            ));
        }
    }
