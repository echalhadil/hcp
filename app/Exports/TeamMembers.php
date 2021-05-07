<?php

namespace App\Exports;

use App\Models\Membership;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeamMembers implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return [
            'id',
            'nom',
            'prenom',
            'cin',
            'email',
            'telephone',
        ];
    }
    public function collection()
    {
        return  collect(Team::members());

    }
}
