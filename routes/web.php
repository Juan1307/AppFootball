<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ Competitions, Teams, Players };

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
    return view('app');
});

// routes for competitions
Route::get('/competitions', [Competitions::class, 'index']);
Route::get('/competitions/{id}', [Competitions::class, 'subindex']);

// routes for teams
Route::get('/teams', [Teams::class, 'index']); // get local
