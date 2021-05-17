<?php

namespace App\Actions\Fortify;

use App\Models\Membership;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users','ends_with:hcp.ma'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cin' => ['required', 'alpha_num', 'min:7', 'unique:users'],
            'tele' => ['required', 'digits:10', 'starts_with:06,07', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(
                User::create([
                    'fname' => $input['fname'],
                    'lname' => $input['lname'],
                    'email' => $input['email'],
                    'cin' => $input['cin'],
                    'tele' => $input['tele'],
                    'password' => Hash::make($input['password']),
                ]),
                function (User $user) {
                    $this->createTeam($user);
                }
            );
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $team = Team::forceCreate([
            'user_id' => $user->id,
            // 'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'name' => $user->fname . "'s Team",
            'personal_team' => true,
        ]);
        $user->ownedTeams()->save(
            $team
        );

        $this->createUserTeam($user, $team);
    }




    protected function createUserTeam(User $user, Team $team)
    {
        $membership = new Membership();
        $membership->team_id = $team->id;
        $membership->user_id = $user->id;
        $membership->role  = 'admin';
        $membership->save();
    }
}
