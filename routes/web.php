<?php

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        "header" => "Ana Sayfa",
       'tableData' => User::paginate(10)
    ]);
});

Route::get('users', function () {
    return Inertia::render('Welcome', [
        "header" => "Kullanıcılar",
       'tableData' => User::paginate(10)
    ]);
})->name('users.index');

Route::get('role-users', function () {
    return Inertia::render('Welcome', [
        "header" => "Role Sahip Kullanıcılar",
       'tableData' => User::paginate(10)
    ]);
})->name('role-users.index');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

//Test

Route::any('test',function(){
return Inertia::render('Test');
})->name('test');


