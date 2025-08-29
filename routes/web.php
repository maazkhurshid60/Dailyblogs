<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', [BlogController::class, function(){
//     return view('blogs.index');
// } ]);

Route::get('/', [BlogController::class, 'index' ])->name('blogs.index');

Route::get('/blogs/add-blog', [BlogController::class, 'addblogs' ])->name('blogs.add-blog');
Route::post('/save', [BlogController::class, 'save' ])->name('blogs.save');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit' ])->name('blogs.edit');
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/deleteblogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.delete');

