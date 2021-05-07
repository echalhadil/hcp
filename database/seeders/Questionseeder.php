<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Questionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

     



        DB::table('questions')->insert([
            ['libelle'=>"nom",'has_option' => 0], //1
            ['libelle'=>"prenom",'has_option' => 0],//2
            ['libelle'=>"cin",'has_option' => 0],//3
            ['libelle'=>"Situation de résidence",'has_option' => 1],//4
            ['libelle'=>"Lien de parenté avec le chef de ménage",'has_option' => 0],//5
            ['libelle'=>"Pays de nationalité",'has_option' => 1],//6
            ['libelle'=>"Sexe",'has_option' => 1],//7
            ['libelle'=>"Date de naissance",'has_option' => 0],//8
            ['libelle'=>"Lieu de naissance",'has_option' => 0],//9
            ['libelle'=>"Lieu de résidence avant la résidence actuelle",'has_option' => 0],//10
            ['libelle'=>"Nombre de personne",'has_option' => 0],//11
            ['libelle'=>"La personne plus que 18ans",'has_option' => 0],//12
            ['libelle'=>"La personne moins que 18ans",'has_option' => 0],//13
            ['libelle'=>"Durée de résidence actuelle",'has_option' => 0],//14
            ['libelle'=>"Etat matrimonial",'has_option' => 1],//15
            ['libelle'=>"Niveau d’étude",'has_option' => 0],//16
            ['libelle'=>"Etablissement",'has_option' => 1],//17
            ['libelle'=>"État Fonctionnel",'has_option' => 1],//18
            ['libelle'=>"Moyen de transport",'has_option' => 0],//19
            ['libelle'=>"Assurance medicale",'has_option' => 1],//20
           
        ]);



        DB::table('options')->insert([
            ['question_id'=>"4",'libelle'=>"	Propriétaire, copropriétaire"],
            ['question_id'=>"4",'libelle'=>"	Accédant à la propriété "],
            ['question_id'=>"4",'libelle'=>"	Locataire sans hypothèque "],
            ['question_id'=>"4",'libelle'=>"	Locataire avec hypothèque "],
            ['question_id'=>"4",'libelle'=>"	Logement de fonction"],
            ['question_id'=>"4",'libelle'=>"	 Logé gratuitement"],

            ['question_id'=>"6",'libelle'=>"	Marocain "],
            ['question_id'=>"6",'libelle'=>"	étranger"],


            ['question_id'=>"7",'libelle'=>"	masculin "],
            ['question_id'=>"7",'libelle'=>"	féminin"],
             

            ['question_id'=>"15",'libelle'=>"	Célibataire "],
            ['question_id'=>"15",'libelle'=>"	Marié(e) "],
            ['question_id'=>"15",'libelle'=>"	Divorcé(e)"],
            ['question_id'=>"15",'libelle'=>"	Veuf(ve)"],


            ['question_id'=>"17",'libelle'=>"	privé"],
            ['question_id'=>"17",'libelle'=>"public"],


            ['question_id'=>"18",'libelle'=>"Employé public"],
            ['question_id'=>"18",'libelle'=>"Un salarié du secteur privé structuré"],
            ['question_id'=>"18",'libelle'=>"Au chômage"],
            ['question_id'=>"18",'libelle'=>"Employé privé, secteur informel"],

            ['question_id'=>"20",'libelle'=>"CNSS"],
            ['question_id'=>"20",'libelle'=>"ASMR"],
            ['question_id'=>"20",'libelle'=>"RAMED"],
            ['question_id'=>"20",'libelle'=>"Sans assurance"],

        ]);

    }
}
