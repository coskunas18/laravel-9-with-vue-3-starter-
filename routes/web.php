<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/', function () {
        return Inertia::render('Welcome');
    });


//POST
Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');
Route::delete('delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::match(['get', 'post'], 'post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::match(['get', 'post'], 'post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');


});





//Test
Route::any('test', function () {
    return Inertia::render('Test');
})->name('test');
