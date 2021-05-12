<?php

namespace App\Exports;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'nom',
            'prenom',
            'cin',
            'Situation de résidence',
            'Lien de parenté avec le chef de ménage',
            'Pays de nationalité',
            'Sexe',
            'Date de naissance',
            'Lieu de naissance',
            'Lieu de résidence avant la résidence actuelle',
            'Nombre de personne',
            'La personne plus que 18ans',
            'La personne moins que 18ans',
            'Durée de résidence actuelle',
            'Etat matrimonial',
            'Niveau d’étude',
            'Etablissement',
            'État Fonctionnel',
            'Moyen de transport',
            'Assurance medicale',
        ];
    }

    public function collection()
    {
        return  collect(Team::members());
    }
}
