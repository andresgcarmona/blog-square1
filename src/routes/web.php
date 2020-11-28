<?php

    use App\Http\Controllers\CreatePostController;
    use App\Http\Controllers\EditPostController;
    use App\Http\Controllers\IndexController;
    use App\Http\Controllers\ShowPostController;
    use App\Http\Controllers\UpdatePostController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', IndexController::class)->name('index');
    Route::get('/post/{post:slug}', ShowPostController::class)->name('post.show');
    Route::get('/post/{post}/edit', EditPostController::class)->name('post.edit');
    Route::post('/post', CreatePostController::class)->name('post.create');
    Route::put('/post/{post}', UpdatePostController::class)->name('post.update');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
