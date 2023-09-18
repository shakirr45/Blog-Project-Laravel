<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//====== Home Page ======>
Route::get('/',[HomeController::class, 'homepage']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

///example
// Route::get('post', [HomeController::class, 'post']);
// Route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// For Post as Admin ====>>
Route::get('/post_page',[AdminController::class, 'post_page']);
Route::post('/add_post',[AdminController::class, 'add_post']);

// Show Post in Admin Table ====>>
Route::get('/show_post',[AdminController::class, 'show_post']);

// Delete Post from Admin Table ====>>
Route::get('/delete_post/{id}',[AdminController::class, 'delete_post']);

// Edit Post from Admin Table ====>>
Route::get('/edit_page/{id}',[AdminController::class, 'edit_page']);
Route::post('/update_post/{id}',[AdminController::class, 'update_post']);

//Post details Page
Route::get('/post_details/{id}',[HomeController::class, 'post_details']);

//user can be post ===>
Route::get('/create_post',[HomeController::class, 'create_post'])->middleware('auth');
Route::post('/user_post',[HomeController::class, 'user_post'])->middleware('auth');

//user can see there posts
Route::get('/my_post',[HomeController::class, 'my_post'])->middleware('auth');

//user can delete there post 
Route::get('/delete_user_post/{id}',[HomeController::class, 'delete_user_post'])->middleware('auth');

//User can edit there post
Route::get('/edit_user_post/{id}',[HomeController::class, 'edit_user_post'])->middleware('auth');
Route::post('/main_edit/{id}',[HomeController::class, 'main_edit'])->middleware('auth');

//for accept post===>
Route::get('/accept_post/{id}',[AdminController::class, 'accept_post']);

//for reject post===>
Route::get('/reject_post/{id}',[AdminController::class, 'reject_post']);









