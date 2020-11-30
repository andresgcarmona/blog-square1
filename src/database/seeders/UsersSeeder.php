<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class UsersSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(): void
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            User::truncate();
            User::factory(10)->create();

            // Create admin user.
            User::factory()->create([
                'name'  => 'admin',
                'email' => 'admin@square1.io',
            ]);

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
