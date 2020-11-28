<?php

    namespace App\Http\Controllers;

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

        public function __invoke()
        {
            $user = auth()->user();

            return view('users.dashboard', compact(
                'user'
            ));
        }
    }
