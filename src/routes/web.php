<?php

    use App\Http\Controllers\CreatePostController;
    use App\Http\Controllers\IndexController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ShowPostController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', IndexController::class)->name('index');
    Route::get('/post/{post:slug}', ShowPostController::class)->name('post.show');
    Route::post('/post', CreatePostController::class)->name('post.create');

    Auth::routes();

    Route::get('/dashboard', ProfileController::class)->name('dashboard');
