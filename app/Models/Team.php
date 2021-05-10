<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Team as JetstreamTeam;

class Team extends JetstreamTeam
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'personal_team' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'personal_team',
        'commune_id',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];



    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }


    public static function members()
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


    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
}
