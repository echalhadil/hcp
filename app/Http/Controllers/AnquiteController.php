<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Models\Anquite;
use App\Models\Membership;
use App\Models\Question;
use App\Models\Team;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel as Excel;


class AnquiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anquites = Anquite::select(
            "id",
            "user_id"
        )->get();
        $questions = Question::all();

        foreach ($anquites as $anquite) {
            $anquite->questions = $questions;
            $anquite->reponses = $anquite->reponses;

            foreach ($anquite->reponses as $reponse) {
                $reponse->value = ($reponse->option != null) ? $reponse->option->libelle : $reponse->value;
            }
        }


        return response()->json([
            'anquites' => $anquites,
            'questions' => $questions
        ]);
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
     * @param  \App\Models\Anquite  $anquite
     * @return \Illuminate\Http\Response
     */
    public function show(Anquite $anquite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anquite  $anquite
     * @return \Illuminate\Http\Response
     */
    public function edit(Anquite $anquite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anquite  $anquite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anquite $anquite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anquite  $anquite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anquite $anquite)
    {
        //
    }



    public function totalAnquite()
    {
        $members = Auth::user()->currentTeam->memberships;

        // for your team.
        $todayTeam = 0;
        $totalTeam = 0;
        foreach ($members as $member) {
            $totalTeam = +Anquite::where('user_id', $member->user_id)
                ->count(); //count anquites that your team did
            $todayTeam = +Anquite::where('user_id', $member->user_id)
                ->whereDate("created_at", date("Y-m-d"))
                ->count();
        }

        //for global.
        $total = Anquite::count(); //count all Anquites.
        $totalToday = Anquite::whereDate("created_at", date("Y-m-d"))->count();


        return Response::json([
            'totalteam' => $totalTeam,
            'todayteam' => $todayTeam,
            'total' => $total,
            'todaytotal' => $totalToday
        ]);
    }

    public function AnquiteTeam()
    {
        $numberofteams =  Team::count();

        $anquites =  DB::table('anquites')
            ->join('team_user', 'team_user.user_id', '=', 'anquites.user_id')
            ->where('team_user.team_id', Auth::user()->current_team_id)
            ->select(DB::raw('DATE(anquites.created_at) as day'), DB::raw('COUNT(anquites.id) as total'))
            ->groupBy('day')
            ->orderBy('anquites.id')
            ->get();

        $avgteams =  DB::table('anquites')
            ->select(DB::raw('DATE(created_at) as day'), DB::raw('COUNT(id) as avg'))
            ->groupBy('day')
            ->get();


        foreach ($avgteams as $team) {
            $team->total = 0;
            $team->avg = (int) ($team->avg / $numberofteams);

            foreach ($anquites as $anquite) {
                if ($team->day == $anquite->day) {
                    $team->total = $anquite->total;
                }
            }
        }
        return $avgteams;
    }







    public function myTeamAnquites()
    {
        $members = Auth::user()->currentTeam->memberships;
        $anquites = array();

        foreach ($members as $member) {
            $a = Anquite::select('created_at')->where('user_id', $member->user_id)->get();
            foreach ($a as $anquite) {
                $anquites[] = $anquite->toArray();
            }
        }


        $collection = collect($anquites)->groupBy("created_at");


        return $collection;
    }








    public function exportData(String $format)
    {
        $user = Auth::user();

        $name =  'anquites-' . date('d-m-Y') . '.' . $format;

        return Excel::download(new DataExport, $name);
    }
}
