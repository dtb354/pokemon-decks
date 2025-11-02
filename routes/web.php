<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StrategyTagController;
use App\Http\Controllers\TypeTagController;
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

Route::get('/admin', function(){
    return view('admin.index');
});

Route::get ('/test/id', function (int $id) {
    return view('test', compact('id'));
});

Route::resource('posts', PostController::class);

Route::resource('profile', ProfileController::class);

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');

Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::put('/admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
Route::patch('/admin/posts/{id}/toggle', [AdminPostController::class, 'toggleActive'])->name('admin.posts.toggle');


Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

//Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
//    Route::resource('type-tags', TypeTagController::class);
//    Route::resource('strategy-tags', StrategyTagController::class);
//});

Route::prefix('admin')->group(function () {
    Route::get('/type-tags', [TypeTagController::class, 'index'])->name('admin.type-tags.index');
    Route::get('/type-tags/create', [TypeTagController::class, 'create'])->name('admin.type-tags.create');
    Route::post('/type-tags', [TypeTagController::class, 'store'])->name('admin.type-tags.store');
});

Route::prefix('admin')->group(function () {
    Route::get('/strategy-tags', [StrategyTagController::class, 'index'])->name('admin.strategy-tags.index');
    Route::get('/strategy-tags/create', [StrategyTagController::class, 'create'])->name('admin.strategy-tags.create');
    Route::post('/strategy-tags', [StrategyTagController::class, 'store'])->name('admin.strategy-tags.store');
});

require __DIR__.'/auth.php';
