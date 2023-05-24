<?php

$controller_namespace = config('theme.frontend_controllers').ucfirst(config('theme.frontend_active_theme')).'\\';

Route::get('/test',function () {
//dd(\App\Models\BlogPost::first());
//    $post = \App\Models\BlogPost::where('title->en','First Post')->get();
    $post = \App\Models\BlogPost::whereTranslation('slug','first-post')->first();
    return route('admin.payment.types.show', ['slug' => $post->slug]);
//    return ($post->translation->slug,$post->translation->title);

   return $blogPost;
});
Route::controller($controller_namespace.'HomeController')->name('home.')->group(function () {
    Route::get('/','index')->name('index');
});
Route::prefix('category')->controller($controller_namespace.'CategoryController')->name('category.')->group(function () {
    Route::get('{slug}','show')->name('show');
});
Route::prefix('product')->controller($controller_namespace.'ProductController')->name('product.')->group(function () {
    Route::get('{slug}','show')->name('show');
});

Route::prefix('cart')->controller($controller_namespace.'CartController')->name('cart.')->group(function () {
    Route::get('/','cart')->name('cart');
});

Route::prefix('about-us')->controller($controller_namespace.'AboutUsController')->name('about-us.')->group(function () {
    Route::get('/','index')->name('index');
});

Route::prefix('contact')->controller($controller_namespace.'ContactController')->name('contact.')->group(function () {
    Route::get('/','index')->name('index');
});

Route::middleware('auth')->group(function () use ($controller_namespace) {
    Route::prefix('cart')->controller($controller_namespace.'CartController')->name('cart.')->group(function () {
        Route::get('checkout','checkout')->name('checkout');
    });
    Route::prefix('account')->controller($controller_namespace.'AccountController')->name('account.')->group(function () {
        Route::get('/','index')->name('index');
        Route::prefix('addresses')->name('addresses.')->group(function () {
            Route::get('/','addresses')->name('list');
            Route::get('add','addressAdd')->name('add');
            Route::post('add','addressAddPost')->name('add.post');
        });
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/','addresses')->name('index');
//            Route::get('/add','addressAdd')->name('add');
        });
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/','orders')->name('index');
            Route::get('{$order_number}','order')->name('show');
//            Route::get('/add','addressAdd')->name('add');
        });
    });
});

Route::get('login', [$controller_namespace.'LoginController', 'showLoginForm'])->name('login');
Route::post('login', [$controller_namespace.'LoginController', 'login']);
Route::post('logout', [$controller_namespace.'LoginController', 'logout'])->name('logout');

Route::get('register', [$controller_namespace.'RegisterController', 'showRegistrationForm'])->name('register');
Route::post('register', [$controller_namespace.'RegisterController', 'register']);

Route::get('password/reset', [$controller_namespace.'ForgotPasswordController', 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [$controller_namespace.'ForgotPasswordController', 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [$controller_namespace.'ResetPasswordController', 'showResetForm'])->name('password.reset');
Route::post('password/reset', [$controller_namespace.'ResetPasswordController', 'reset'])->name('password.update');
