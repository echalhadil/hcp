<?php

use App\Http\Controllers\AnquiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TeamController;
use App\Models\Anquite;
use App\Models\Option;
use App\Models\Team;
use App\Models\Reponse;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
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



Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/data', function () {
    return Inertia::render('DataCollection');
})->name('data');




// Route::resource('teams',TeamController::class);



Route::get('/export/{format}', [TeamController::class, 'exportTeamMembers'])
    ->name('exportmembers');



Route::get('/totalAnquite', [AnquiteController::class, 'totalAnquite']);

Route::get('/anquiteteam', [AnquiteController::class, 'AnquiteTeam']);






///LOC1ATION ////

Route::get('/regions', [LocationController::class, 'regions'])
    ->name('regions');
Route::get('/regions/{region_id}/provinces', [LocationController::class, 'provinces'])
    ->name('provinces');
Route::get('/regions/{region_id}/provinces/{province_id}/communes', [LocationController::class, 'communes'])
    ->name('communes');

//set team location

Route::post('/setTeamLocation', [LocationController::class, 'setTeamLocation'])->name('setlocation');
Route::get('/location', [LocationController::class, 'getTeamLocation']);



Route::get('/countmembers', [TeamController::class, 'countMembers']);



Route::resource('anquites', AnquiteController::class);




Route::get('e/{format}', [AnquiteController::class, 'exportData']);


Route::get('/question-statistics/{question_id}', [AnquiteController::class, 'questionStatistics'])
    ->name('questionstatistics');


Route::get('insert', function () {

    $anq = new Anquite();
    $anq->user_id = Auth::id();
    $anq->commune_id = Team::find(Auth::user()->current_team_id)->commune_id;
    $anq->save();
});




Route::get('/personneUnderOver18', [AnquiteController::class, 'personneUnderOver18'])->name('personneunderover18');



Route::get('/age-pyramid', function () {
    //group by sexe 
    //group by age
    // $an = Anquite::with('reponses')->get();
    $an = Anquite::select('id')->get();


    // return $an ;
    foreach ($an as $anquite) {
        $sexe = Option::find(
            Reponse::where('question_id', 7)
                ->where('anquite_id', $anquite->id)
                ->first()->option_id
        );
        $age =
            Reponse::select('value')->where('question_id', "=", (int) 8)
                ->where('anquite_id', $anquite->id)
                ->first();
            // DB::table('reponses')
            // ->select('value')
            // ->where('question_id', "=", (int) 8)
            // ->where('anquite_id', $anquite->id)
            // ->first();
        $anquite->sexe =  $sexe->libelle;
        // $anquite->age = DateTime::createFromFormat('d-m-Y', $age->value);
        $anquite->age = $age->value;
    }


    return collect($an)->groupBy('sexe');
    
})->name('agepyramid');
