<?php

    use App\Http\Controllers\Api\ListPostsController;
    use Illuminate\Support\Facades\Route;

    Route::group([], static function()
    {
        Route::get('/posts', ListPostsController::class);
    });
