<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', PostController::class);
});

Route::get('/about-us', function() {
    $company = 'Hogeschool Rotterdam';
    return view('about-us', [
        'company' => $company
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('products/{name}', function(string $name) {
    // code
    $product = $name;
    return view('products', [
        'product' => $product
    ]);
});

Route::get ('/test/id', function (int $id) {
    return view('test', compact('id'));
});

Route::get('/user/profile', function () {
    // ...
})->name('profile');

Route::get('/products/details/{id?}', function ($id) {
    return "Product details voor product met ID: " . $id;
})->name('product.details');
//Named Routing

Route::resource('products', ProductController::class);

Route::resource('posts', PostController::class);

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');

Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::put('/admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
Route::patch('/admin/posts/{id}/toggle', [AdminPostController::class, 'toggleActive'])->name('admin.posts.toggle');


Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');



require __DIR__.'/auth.php';
