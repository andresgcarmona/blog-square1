<?php

    namespace App\Console\Commands;

    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Str;

    class FetchPostsFromApi extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'posts:fetch';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Fetch new posts from API.';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
        {
            $this->output->title('Fetching posts from server.');

            $response = Http::get(config('blog.api_url'));

            // Get admin user.
            $user = User::where('email', 'admin@square1.io')->first();

            if (!$user) {
                return 1;
            }

            $posts = $response->json()['data'];
            $bar   = $this->output->createProgressBar(count($posts));

            foreach ($posts as $post) {
                // Check if post exists.
                $slug = Str::slug($post['title']);

                if (!Post::where('slug', $slug)->exists()) {
                    Post::create([
                        'user_id'      => $user->id,
                        'title'        => $post['title'],
                        'slug'         => $slug,
                        'description'  => $post['description'],
                        'published_at' => $post['publication_date'],
                    ]);
                }

                $bar->advance();
            }

            $bar->finish();

            $this->line('');
            $this->line('');

            $this->output->success('DONE!');

            return 0;
        }
    }
