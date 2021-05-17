<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Province;
use App\Models\Region;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    //

    public function regions()
    {
        # code...
        return response()->json(Region::all());
    }


    public function provinces($region_id)
    {
        return response()->json(Province::where('region_id', $region_id)->get());
    }

    public function communes($region_id, $province_id)
    {
        return response()->json(Commune::where('province_id', $province_id)->get());
    }


    public function setTeamLocation(Request $request)
    {

        $request->validate([
            'commune_id' => ['required']
        ]);

        try {
            $currentTeam = Team::find(Auth::user()->current_team_id);
            $currentTeam->commune_id = $request->commune_id;
            $currentTeam->save();
            return response()->json(true);
        } catch (\Throwable $th) {

            return response()->json(false);
        }
    }


    static function getTeamLocation()
    {
        $team_id = Auth::user()->current_team_id;

        if ($team_id != 0) {
            $team = Team::find($team_id);
            // $team = Team::find(1);

            if ($team->commune_id != 0) {
                $team->commune->province;
                $team->commune->province->region;
                $commune = $team->commune;
                return $commune;
            }
        }
        return ["province" => ["region" => []]];
    }
}
