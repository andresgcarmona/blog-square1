<?php

    namespace Database\Factories;

    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Factories\Factory;

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
            return [
                'user_id'          => User::inRandomOrder()->first()->id,
                'title'            => $this->faker->sentences(3, true),
                'description'      => $this->faker->paragraphs(2, true),
                'body'             => $this->faker->paragraphs(6, true),
                'publication_date' => now(),
            ];
        }
    }