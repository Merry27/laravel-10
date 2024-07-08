<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use OpenAI\Laravel\Facades\OpenAI;
use Laravel\Socialite\Facades\Socialite;

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
 
 
Route::post('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    
    $user = User::firstOrCreate(['email' => $user->email],[
        'name' => $user->name,
        'password' => 'password',
    ]);
    Auth::login($user);
    return redirect('/dashboard');
});

Route::middleware('auth')->prefix('ticket')->name('ticket.')->group(function(){
    Route::resource('/',TicketController::class);
    
    
    // Route::post('/ticket/create',[TicketController::class,'store']);
});
 
Route::get('/show/{ticket}',[TicketController::class,'show'])->name('ticket.show');;
Route::delete('/ticket/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');
Route::get('/ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::patch('/ticket/{ticket}', [TicketController::class, 'update'])->name('ticket.update');


