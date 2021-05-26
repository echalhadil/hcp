<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Contracts\Auth\MustVerifyEmail;

class DashboardController extends Controller 
{
    // use Notifiable;

    public function index()
    {

        return Inertia::render('Dashboard')->with(
            'location',
            LocationController::getTeamLocation()
        );
    }
}
