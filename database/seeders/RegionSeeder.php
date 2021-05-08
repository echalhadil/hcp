<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      

        // Region::all()->dd();


        DB::table('regions')->insert([

            ['id' =>    "1", 'libelle'  => "Tanger-Tétouan-Al Hoceïma"],
            ['id' =>    "2", 'libelle'  => "L'Oriental"],
            ['id' =>    "3", 'libelle'  => "Fès-Meknès"],
            ['id' =>   "4", 'libelle'   => "Rabat-Salé-Kénitra"],
            ['id' =>    "5", 'libelle'  => "Béni Mellal-Khénifra"],
            ['id' =>   "6", 'libelle'   => "Casablanca-Settat"],
            ['id' =>   "7", 'libelle'   => "Marrakech-Safi"],
            ['id' =>    "8", 'libelle'  => "Drâa-Tafilalet"],
            ['id' =>    "9", 'libelle'  => "Souss-Massa"],
            ['id' =>    "10", 'libelle' => "Guelmim-Oued Noun"],
            ['id' =>    "11", 'libelle' => "Laâyoune-Sakia El Hamra"],
            ['id' =>    "12", 'libelle' => "Dakhla-Oued Ed-Dahab"]
        ]);


        $p = new ProvinceSeeder();
        $p-> run();

        $c = new CommuneSeeder();
        $c ->run();

    }
}
