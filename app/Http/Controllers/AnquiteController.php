<?php

namespace App\Http\Controllers;

use App\Models\Anquite;
use App\Models\Commune;
use App\Models\Option;
use App\Models\Province;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;


class AnquiteController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $anquites = Anquite::select(
    //         "id",
    //         "user_id",
    //         "commune_id"
    //     )->get();
    //     $questions = Question::all();

    //     foreach ($anquites as $anquite) {
    //         $anquite->questions = $questions;
    //         $anquite->reponses = $anquite->reponses;

    //         $anquite->commune = $anquite->commune;
    //         $anquite->province = $anquite->commune->province;
    //         $anquite->region  = $anquite->province->region;

    //         $anquite->region  = $anquite->region->libelle;
    //         $anquite->province = $anquite->province->libelle;
    //         $anquite->commune = $anquite->commune->libelle;

    //         foreach ($anquite->reponses as $reponse) {
    //             $reponse->value = ($reponse->option != null) ? $reponse->option->libelle : $reponse->value;
    //         }
    //     }

    //     return response()->json([
    //         'anquites' => $anquites,
    //         'questions' => $questions
    //     ]);
    // }








    public function data($region_id, $province_id, $commune_id)
    {
        $anquites = array();

        // $query = Anquite::query();

        if ($commune_id) {
            $anquites[] = Anquite::select(
                "id",
                "user_id",
                "commune_id"
            )->where('commune_id', $commune_id)->get();

            $anquites = collect($anquites)->collapse();
        } elseif ($province_id) {

            $communes = Commune::where('province_id', $province_id)->get();
            foreach ($communes as $commune) {
                $anquites[] = Anquite::select(
                    "id",
                    "user_id",
                    "commune_id"
                )->where('commune_id', $commune->id)->get();
            }
            $anquites = collect($anquites)->collapse();
        } elseif ($region_id) {

            $provinces = Province::where('region_id', $region_id)->get();
            foreach ($provinces as $province) {
                $communes = Commune::where('province_id', $province->id)->get();
                foreach ($communes as $commune) {
                    $anquites[] = Anquite::select(
                        "id",
                        "user_id",
                        "commune_id"
                    )->where('commune_id', $commune->id)->get();
                }
            }
            $anquites = collect($anquites)->collapse();
        } else {

            $anquites = Anquite::select(
                "id",
                "user_id",
                "commune_id"
            )->get();
        }






        $questions = Question::all();

        foreach ($anquites as $anquite) {
            $anquite->questions = $questions;
            $anquite->reponses = $anquite->reponses;

            $anquite->commune = $anquite->commune;
            $anquite->province = $anquite->commune->province;
            $anquite->region  = $anquite->province->region;

            $anquite->region  = $anquite->region->libelle;
            $anquite->province = $anquite->province->libelle;
            $anquite->commune = $anquite->commune->libelle;

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

    public function update(Request $request, Anquite $anquite)
    {
        $questions =  $request->all();
        foreach ($questions as $question) {

            $question = (object)$question; //parse array into object.

            $reponse = Reponse::where('question_id', $question->id) //exists ??
                ->where('anquite_id', $question->anquite_id)
                ->first();

            if ($reponse) {

                ($question->has_option) ? ($reponse->option_id = $question->option_id)  //do this if reponse exists
                    : ($reponse->value = $question->reponse);
                $reponse->save();
            } elseif ($question->option_id || $question->reponse) { //else
                $reponse = new Reponse();
                $reponse->anquite_id = $question->anquite_id;
                $reponse->question_id = $question->id;
                $reponse->option_id = $question->option_id;
                $reponse->value = $question->reponse;
                $reponse->save();
            }

            // $question = (array)$question; //parse into array.


        }


        // return $reponse;
        return response()->json($questions);
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

    // public function personneUnderOver18()
    // {


    //     return response()->json([
    //         [
    //             'question' => Question::find(12)->libelle,
    //             'nombre' => Reponse::where("question_id", 12)->sum('value'),
    //         ],
    //         [
    //             'question' => Question::find(13)->libelle,
    //             'nombre' => Reponse::where("question_id", 13)->sum('value'),
    //         ]
    //     ]);
    // }



    public function personneUnderOver18($region_id, $province_id, $commune_id)
    {
        $nombre = $nombre2 = 0;
        if ($commune_id != 0) {
            $anquites = Anquite::where('commune_id', $commune_id)->get();
            foreach ($anquites as $anquite) {

                $nombre = Reponse::where('question_id', 12)
                    ->where('anquite_id', $anquite->id)
                    ->sum('value');

                $nombre2 = Reponse::where('question_id', 13)
                    ->where('anquite_id', $anquite->id)
                    ->sum('value');
            }
        } elseif ($province_id != 0) {

            $communes = Commune::where('province_id', $province_id)->get();
            foreach ($communes as $commune) {
                $anquites = Anquite::where('commune_id', $commune->id)->get();
                foreach ($anquites as $anquite) {

                    $nombre = Reponse::where('question_id', 12)
                        ->where('anquite_id', $anquite->id)
                        ->sum('value');

                    $nombre2 = Reponse::where('question_id', 13)
                        ->where('anquite_id', $anquite->id)
                        ->sum('value');
                }
            }
        } elseif ($region_id != 0) {

            $provinces = Province::where('region_id', $region_id)->get();
            foreach ($provinces as $province) {
                $communes = Commune::where('province_id', $province->id)->get();
                foreach ($communes as $commune) {
                    $anquites = Anquite::where('commune_id', $commune->id)->get();
                    foreach ($anquites as $anquite) {

                        $nombre = Reponse::where('question_id', 12)
                            ->where('anquite_id', $anquite->id)
                            ->sum('value');

                        $nombre2 = Reponse::where('question_id', 13)
                            ->where('anquite_id', $anquite->id)
                            ->sum('value');
                    }
                }
            }
        } elseif ($region_id == 0) {

            $nombre = Reponse::where('question_id', 12)
                ->sum('value');

            $nombre2 = Reponse::where('question_id', 13)
            ->sum('value');

        }




        return response()->json([
            [
                'question' => Question::find(12)->libelle,
                'nombre' => $nombre,
            ],
            [
                'question' => Question::find(13)->libelle,
                'nombre' => $nombre2,
            ]
        ]);
    }



















    public function questionStatisticsSp($question_id, $region_id, $province_id, $commune_id)
    {
        $numberofAnquites = 0; //initialize variable by 0.
        $reponses = array();
        if ($commune_id != 0) {
            $numberofAnquites = Anquite::where('commune_id', $commune_id)->count();
            $reponses[] = $this->reponses($question_id, $commune_id);
        } elseif ($province_id != 0) {

            $communes = Commune::where('province_id', $province_id)->get();
            foreach ($communes as $commune) {
                $numberofAnquites += Anquite::where('commune_id', $commune->id)->count();

                $reponses[] = $this->reponses($question_id, $commune->id);
            }
        } elseif ($region_id != 0) {

            $provinces = Province::where('region_id', $region_id)->get();
            foreach ($provinces as $province) {
                $communes = Commune::where('province_id', $province->id)->get();
                foreach ($communes as $commune) {
                    $numberofAnquites += Anquite::where('commune_id', $commune->id)->count();

                    $reponses[] = $this->reponses($question_id, $commune->id);
                }
            }
        } elseif ($region_id == 0) {

            $numberofAnquites = Anquite::count();

            $reponses[] = DB::table('reponses')
                ->where('question_id', $question_id)
                ->select('option_id', DB::raw('COUNT(*) as percent'))
                ->groupBy('option_id')
                ->get();
        }

        //get number of anquites
        $options = Option::select('id', 'libelle')->where('question_id', $question_id)->orderby('id')->get();

        $reponses = collect($reponses)->collapse(); //collapse all data .

        foreach ($options as $option) {
            $option->percent = 0;
            foreach ($reponses as $reponse) {
                if ($option->id == $reponse->option_id)
                    $option->percent = ($numberofAnquites) ? (float) round(($reponse->percent / $numberofAnquites) * 100, 2) : $numberofAnquites;
            }
        }

        return response()->json($options);
        // return response()->json($reponses);
    }


    public function reponses($question_id, $commune_id)
    {
        $anquites = Anquite::where('commune_id', $commune_id)->get();
        $reponses = null;
        foreach ($anquites as $anquite) {
            $reponses[] = DB::table('reponses')
                ->where('question_id', $question_id)
                ->where('anquite_id', $anquite->id)
                ->select('option_id', DB::raw('COUNT(*) as percent'))
                ->groupBy('option_id')
                ->get();
        }
        return collect($reponses)->collapse();
    }
}
