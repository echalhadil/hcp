<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Models\Anquite;
use App\Models\Option;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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

        Validator::make($request, [
            'user_id' => ['required', 'numeric'],
            'commune_id' => ['required', 'numeric'],
            'questions' => ['array'],
        ]);


        $anquite = new Anquite();
        $anquite->user_id = $request->user_id;
        $anquite->commune_id = $request->commune_id;
        $anquite->save();


        if (
            $anquite->reponses()->createMany([
                [
                    'question_id' => $request->questions->question_id,
                    'option_id' => $request->questions->option_id,
                    'value' => $request->questions->value,
                ],
                [
                    'question_id' => $request->questions->question_id,
                    'option_id' => $request->questions->option_id,
                    'value' => $request->questions->value,
                ],
            ])
        )

            return response()->json(true);

        return response()->json(false);
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
        ////////this week  ///////////
        //DATE(NOW()) - INTERVAL 7 DAY
        ////////last week  ///////////
        // BETWEEN DATE(NOW()) - INTERVAL 7 DAY AND  DATE(NOW()) - INTERVAL 7 DAY

        $numberofteams =  Team::count();

        $anquites =  DB::table('anquites')
            ->join('team_user', 'team_user.user_id', '=', 'anquites.user_id')
            ->where('team_user.team_id', Auth::user()->current_team_id)
            ->whereDate('anquites.created_at', '>=', DB::raw('DATE(NOW()) - INTERVAL 7 DAY'))
            ->select(DB::raw('DATE(anquites.created_at) as day'), DB::raw('COUNT(anquites.id) as total'))
            ->groupBy('day')
            ->orderBy('anquites.id')
            ->get();

        $avgteams =  DB::table('anquites')
            ->select(DB::raw('DATE(created_at) as day'), DB::raw('COUNT(id) as avg'))
            // ->whereRaw('DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)')
            // ->whereDate('created_at', Carbon::now()->subDays(7))
            ->whereDate('created_at', '>=', DB::raw('DATE(NOW()) - INTERVAL 7 DAY'))

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

    public function questionStatistics($question_id)
    {
        $numberofAnquites = Anquite::count();
        //get number of anquites
        $options = Option::select('id', 'libelle')->where('question_id', $question_id)->orderby('id')->get();
        //get all availible options
        $reponses = DB::table('reponses')
            ->where('question_id', $question_id)
            ->select('option_id', DB::raw('COUNT(*) as percent'))
            ->groupBy('option_id')
            ->get();

        foreach ($options as $option) {
            $option->percent = 0;
            foreach ($reponses as $reponse) {
                if ($option->id == $reponse->option_id)
                    $option->percent = (float) round(($reponse->percent / $numberofAnquites) * 100, 2);
            }
        }


        return response()->json($options);
    }
}
