<?php

namespace App\Http\Controllers;

use App\Exports\TeamMembers;
use App\Models\Membership;
use App\Models\Team;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Laravel\Jetstream\Membership;
// use Laravel\Jetstream\Team;
// use PhpParser\Node\Expr\Cast\Array_;

use Maatwebsite\Excel\Facades\Excel as Excel;



class TeamController extends Controller
{



    public function exportTeamMembers(String $format)
    {
        $user = Auth::user();

        $name = $user->currentTeam->name . ' ' . date('d-m-Y') . '.' . $format;

        return Excel::download(new TeamMembers, $name);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = array();


        $user = Auth::user();

        $memberships =  $user->currentTeam->memberships;

        foreach ($memberships as $membership) {
            $members[] = DB::table('users')->where('id', '=', $membership->user_id)->select(
                'id',
                'fname',
                'lname',
                'cin',
                'email',
                'tele',
            )->first();
        }

        return $members;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function countMembers()
    {

        return response()->json(
            [
                'myteam' => Membership::where('team_id', Auth::user()->current_team_id)->count(),
                'total' => Membership::count()
            ]
        );
    }
}
