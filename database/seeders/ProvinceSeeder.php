<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // Province::all()->dd();


        //     Region::find(1)->provinces()->createMany([

        //         ['libelle' => "Tanger-Assilah"],
        //         ['libelle' => "M'diq-Fnideq"],
        //         ['libelle' => "Tétouan"],
        //         ['libelle' => "Fahs-Anjra"],
        //         ['libelle' => "Larache"],
        //         ['libelle' => "Al Hoceima"],
        //         ['libelle' => "Chefchaouen"],
        //         ['libelle' => "Ouazzane"],
        //     ]);

        //     Region::find(2)->provinces()->createMany([

        //         ['libelle' => "Oujda-Angad"],
        //         ['libelle' => "Nador"],
        //         ['libelle' => "Driouch"],
        //         ['libelle' => "Jerada"],
        //         ['libelle' => "Berkan"],
        //         ['libelle' => "Taourirt"],
        //         ['libelle' => "Guercif"],
        //         ['libelle' => "Figuig"],

        //     ]);

        //     Region::find(3)->provinces()->createMany([
        //         ['libelle' => "Fès"],
        //         ['libelle' => "Meknès"],
        //         ['libelle' => "El Hajeb"],
        //         ['libelle' => "Ifrane"],
        //         ['libelle' => "Moulay Yacoub"],
        //         ['libelle' => "Sefrou"],
        //         ['libelle' => "Boulemane"],
        //         ['libelle' => "Taounate"],
        //         ['libelle' => "Taza"],
        //     ]);

        //     Region::find(4)->provinces()->createMany([

        //         ['libelle' => "​Rabat"],
        //         ['libelle' => "Salé"],
        //         ['libelle' => "Skhirate-Témara"],
        //         ['libelle' => "Kénitra"],
        //         ['libelle' => "Khémisset"],
        //         ['libelle' => "Sidi Kacem"],
        //         ['libelle' => "Sidi Slimane"],
        //     ]);

        //     Region::find(5)->provinces()->createMany([

        //         ['libelle' => "Béni Mellal"],
        //         ['libelle' => "Azilal"],
        //         ['libelle' => "Fquih Ben Salah"],
        //         ['libelle' => "Khénifra"],
        //         ['libelle' => "Khouribga"],
        //     ]);


        //     Region::find(6)->provinces()->createMany([

        //         ['libelle' => "Casablanca"],
        //         ['libelle' => "Mohammadia"],
        //         ['libelle' => "El Jadida"],
        //         ['libelle' => "Nouaceur"],
        //         ['libelle' => "Médiouna"],
        //         ['libelle' => "Benslimane"],
        //         ['libelle' => "Berrechid"],
        //         ['libelle' => "Settat"],
        //         ['libelle' => "Sidi Bennour"],
        //     ]);


        //     Region::find(7)->provinces()->createMany([

        //         ['libelle' => "Marrakech"],
        //         ['libelle' => "Chichaoua"],
        //         ['libelle' => "Al Haouz"],
        //         ['libelle' => "Kelâa des Sraghna"],
        //         ['libelle' => "Essaouira"],
        //         ['libelle' => "Rehamna"],
        //         ['libelle' => "Safi"],
        //         ['libelle' => "Youssoufia"],
        //     ]);


        //     Region::find(8)->provinces()->createMany([

        //         ['libelle' => "Errachidia"],
        //         ['libelle' => "Ouarzazate"],
        //         ['libelle' => "Midelt"],
        //         ['libelle' => "Tinghir"],
        //         ['libelle' => "Zagora"],
        //     ]);

        //     Region::find(9)->provinces()->createMany([

        //         [ 'libelle' => "Tata"],
        //         [ 'libelle' => "Agadir-Ida-Ou-Tanane"],
        //         [ 'libelle' => "Chtouka-Ait Baha"],
        //         [ 'libelle' => "Inezgane-Ait Melloul"],
        //         [ 'libelle' => "Tiznit"],
        //         ['libelle' => "Taroudannt"]

        //     ]);

        //     Region::find(10)->provinces()->createMany([

        //         ['libelle' => "Guelmim"],
        //         ['libelle' => "Assa-Zag"],
        //         ['libelle' => "Tan-Tan"],
        //         ['libelle' => "Sidi Ifni"],
        //     ]);

        //     Region::find(11)->provinces()->createMany([

        //         ['libelle' => "Laâyoune"],
        //         ['libelle' => "Boujdour"],
        //         ['libelle' => "Tarfaya"],
        //         ['libelle' => "Es-Semara​"],
        //     ]);

        //     Region::find(12)->provinces()->createMany([

        //         ['libelle' => "Oued Ed-Dahab"],
        //         ['libelle' => "Aousserd"],

        //     ]);
        // }


















        DB::table('provinces')->insert([

        ['region_id' =>"1" ,'libelle' => "Tanger-Assilah"],
        ['region_id' =>"1" ,'libelle' => "M'diq-Fnideq"],
        ['region_id' =>"1" ,'libelle' => "Tétouan"],
        ['region_id' =>"1" ,'libelle' => "Fahs-Anjra"],
        ['region_id' =>"1" ,'libelle' => "Larache"],
        ['region_id' =>"1" ,'libelle' => "Al Hoceima"],
        ['region_id' =>"1" ,'libelle' => "Chefchaouen"],
        ['region_id' =>"1" ,'libelle' => "Ouazzane"],


        ['region_id' =>"2" ,'libelle' => "Oujda-Angad"],
        ['region_id' =>"2" ,'libelle' => "Nador"],
        ['region_id' =>"2" ,'libelle' => "Driouch"],
        ['region_id' =>"2" ,'libelle' => "Jerada"],
        ['region_id' =>"2" ,'libelle' => "Berkan"],
        ['region_id' =>"2" ,'libelle' => "Taourirt"],
        ['region_id' =>"2" ,'libelle' => "Guercif"],
        ['region_id' =>"2" ,'libelle' => "Figuig"],

 
        ['region_id' =>"3" ,'libelle' => "Fès"],
        ['region_id' =>"3" ,'libelle' => "Meknès"],
        ['region_id' =>"3" ,'libelle' => "El Hajeb"],
        ['region_id' =>"3" ,'libelle' => "Ifrane"],
        ['region_id' =>"3" ,'libelle' => "Moulay Yacoub"],
        ['region_id' =>"3" ,'libelle' => "Sefrou"],
        ['region_id' =>"3" ,'libelle' => "Boulemane"],
        ['region_id' =>"3" ,'libelle' => "Taounate"],
        ['region_id' =>"3" ,'libelle' => "Taza"],


        ['region_id' =>"4" ,'libelle' => "​Rabat"],
        ['region_id' =>"4" ,'libelle' => "Salé"],
        ['region_id' =>"4" ,'libelle' => "Skhirate-Témara"],
        ['region_id' =>"4" ,'libelle' => "Kénitra"],
        ['region_id' =>"4" ,'libelle' => "Khémisset"],
        ['region_id' =>"4" ,'libelle' => "Sidi Kacem"],
        ['region_id' =>"4" ,'libelle' => "Sidi Slimane"],
   
        ['region_id' =>"5" ,'libelle' => "Béni Mellal"],
        ['region_id' =>"5" ,'libelle' => "Azilal"],
        ['region_id' =>"5" ,'libelle' => "Fquih Ben Salah"],
        ['region_id' =>"5" ,'libelle' => "Khénifra"],
        ['region_id' =>"5" ,'libelle' => "Khouribga"],
   
        ['region_id' =>"6" ,'libelle' => "Casablanca"],
        ['region_id' =>"6" ,'libelle' => "Mohammadia"],
        ['region_id' =>"6" ,'libelle' => "El Jadida"],
        ['region_id' =>"6" ,'libelle' => "Nouaceur"],
        ['region_id' =>"6" ,'libelle' => "Médiouna"],
        ['region_id' =>"6" ,'libelle' => "Benslimane"],
        ['region_id' =>"6" ,'libelle' => "Berrechid"],
        ['region_id' =>"6" ,'libelle' => "Settat"],
        ['region_id' =>"6" ,'libelle' => "Sidi Bennour"],


        ['region_id' =>"7" ,'libelle' => "Marrakech"],
        ['region_id' =>"7" ,'libelle' => "Chichaoua"],
        ['region_id' =>"7" ,'libelle' => "Al Haouz"],
        ['region_id' =>"7" ,'libelle' => "Kelâa des Sraghna"],
        ['region_id' =>"7" ,'libelle' => "Essaouira"],
        ['region_id' =>"7" ,'libelle' => "Rehamna"],
        ['region_id' =>"7" ,'libelle' => "Safi"],
        ['region_id' =>"7" ,'libelle' => "Youssoufia"],
 
        ['region_id' =>"8" ,'libelle' => "Errachidia"],
        ['region_id' =>"8" ,'libelle' => "Ouarzazate"],
        ['region_id' =>"8" ,'libelle' => "Midelt"],
        ['region_id' =>"8" ,'libelle' => "Tinghir"],
        ['region_id' =>"8" ,'libelle' => "Zagora"],
    

        ['region_id' =>"9" ,'libelle' => "Tata"],
        ['region_id' =>"9" , 'libelle' => "Agadir-Ida-Ou-Tanane"],
        ['region_id' =>"9" ,'libelle' => "Chtouka-Ait Baha"],
        ['region_id' =>"9" , 'libelle' => "Inezgane-Ait Melloul"],
        ['region_id' =>"9" , 'libelle' => "Tiznit"],
        [ 'region_id' =>"9" ,'libelle' => "Taroudannt"],

  

        ['region_id' =>"10" ,'libelle' => "Guelmim"],
        ['region_id' =>"10" ,'libelle' => "Assa-Zag"],
        ['region_id' =>"10" ,'libelle' => "Tan-Tan"],
        ['region_id' =>"10" ,'libelle' => "Sidi Ifni"],
   

        ['region_id' =>"11" ,'libelle' => "Laâyoune"],
        ['region_id' =>"11" ,'libelle' => "Boujdour"],
        ['region_id' =>"11" ,'libelle' => "Tarfaya"],
        ['region_id' =>"11" ,'libelle' => "Es-Semara​"],
   

        ['region_id' =>"12" ,'libelle' => "Oued Ed-Dahab"],
        ['region_id' =>"12" ,'libelle' => "Aousserd"],

    ]);
    }
}
















