<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
//    $contacts = DB::table('contacts')->get();
//    $contacts = DB::table('contacts')->count();
//    $contacts = User::all();
   $contacts = User::find(2);
//    return view('dashboard');
    // $contacts = DB::table('users')->insert([
    //     'name' => 'Jb',
    //     'email' => 'jb@gmail.com',
    //     'password' => 'mahawak City' ,
    // ]);

    // $contacts = User::create([
    //     'name' => 'Jbv',
    //     'email' => 'jbb@gmail.com',
    //     'password' => '12345687f' ,
    // ]);
    // $contacts = User::create([
    //     'name' => 'boy',
    //     'email' => 'boy@gmail.com',
    //     'password' => bcrypt('12345687f') ,
    // ]);
    //  $contacts = User::create([
    //     'name' => 'boy4',
    //     'email' => 'boy45@gmail.com',
    //     'password' =>'password' ,
    // ]);
    dd($contacts->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
