<?php

    namespace Database\Factories;

    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Str;

    class PostFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Post::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition(): array
        {
            $title = $this->faker->sentence;

            return [
                'user_id'      => User::inRandomOrder()->first()->id,
                'title'        => $title,
                'slug'         => Str::slug($title),
                'description'  => $this->faker->paragraphs(2, true),
                'published_at' => now(),
            ];
        }
    }
