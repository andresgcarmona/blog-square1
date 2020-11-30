<?php

    use App\Http\Controllers\Api\ListPostsController;
    use App\Http\Controllers\Api\TogglePublishStatusController;
    use Illuminate\Support\Facades\Route;

    Route::middleware('auth:sanctum')->group(static function()
    {
        Route::get('/posts', ListPostsController::class);
        Route::post('/post/{post}/toggle-publish-status', TogglePublishStatusController::class);
    });
