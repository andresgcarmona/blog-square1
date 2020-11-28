<?php

    use App\Http\Controllers\IndexController;
    use App\Http\Controllers\ShowPostController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', IndexController::class)->name('index');
    Route::get('/post/{post}', ShowPostController::class)->name('post.show');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
