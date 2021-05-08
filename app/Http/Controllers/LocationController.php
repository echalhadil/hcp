<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //

    public function regions()
    {
        # code...
        return response()->json( Region::all() );
    }


    public function provinces( $region_id)
    {
        return response()->json( Province::where('region_id',$region_id)->get() );
    }

    public function communes( $region_id,$province_id)
    {
        return response()->json( Commune::where('province_id',$province_id)->get() );
    }


}
