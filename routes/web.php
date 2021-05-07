<?php

use App\Http\Controllers\AnquiteController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TeamController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use phpDocumentor\Reflection\Types\Resource_;

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
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/data', function () {
    return Inertia::render('DataCollection');
})->name('data');




Route::resource('team',TeamController::class);



Route::get('/export/{format}',[TeamController::class,'exportTeamMembers'])
->name('exportmembers');



Route::get('/anquites',[AnquiteController::class,'totalAnquite']);

Route::get('/anquiteteam',[AnquiteController::class,'AnquiteTeam']);






///////REGIONS /////////////////
// Route::resource('regions',RegionController::class);

Route::get('/regions',[LocationController::class,'regions']);

Route::get('/regions/{region_id}/provinces',[LocationController::class,'provinces']);




Route::get('/countmembers',[TeamController::class,'countMembers']);



