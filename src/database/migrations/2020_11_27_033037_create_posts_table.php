<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(): void
        {
            Schema::create('posts', function (Blueprint $table)
            {
                $table->id();
                $table->foreignId('user_id')->constrained('users');
                $table->mediumText('title');
                $table->text('slug')->nullable();
                $table->mediumText('description');
                $table->longText('body');
                $table->timestamp('published_at')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(): void
        {
            Schema::dropIfExists('posts');
        }
    }
