<?php

use App\Models\Pemberitahuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/user')->group(function(){
    Route::get('dashboard', Function(){
        $pemberitahuan = Pemberitahuan::where('status', 'aktif')->get();

        return view('user.dashboard', compact('pemberitahuan'));
    })->name('user.dashboard');
});