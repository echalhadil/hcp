<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('communes')->insert(
            [
                // chtouka ait baha
                ['province_id' => "62", 'libelle' =>    "Ait Amira "],
                ['province_id' => "62", 'libelle' =>    "Ait Baha "],
                ['province_id' => "62", 'libelle' =>    "Ait Milk"],
                ['province_id' => "62", 'libelle' =>    "Ait Mzal"],
                ['province_id' => "62", 'libelle' =>    "Ait Ouadrim"],
                ['province_id' => "62", 'libelle' =>    "Aouguenz"],
                ['province_id' => "62", 'libelle' =>    "Belfaa"],
                ['province_id' => "62", 'libelle' =>    "Biougra"],
                ['province_id' => "62", 'libelle' =>    "Hilala"],
                ['province_id' => "62", 'libelle' =>    "Ida Ougnidif"],
                ['province_id' => "62", 'libelle' =>    "Imi Mqourn"],
                ['province_id' => "62", 'libelle' =>    "Inchaden"],
                ['province_id' => "62", 'libelle' =>    "Massa"],
                ['province_id' => "62", 'libelle' =>    "Ouad Essafa"],
                ['province_id' => "62", 'libelle' =>    "Sidi Abdallah El Bouchouari"],
                ['province_id' => "62", 'libelle' =>    "Sidi Bibi"],
                ['province_id' => "62", 'libelle' =>    "Sidi Boushab"],
                ['province_id' => "62", 'libelle' =>    "Sidi Ouassay"],
                ['province_id' => "62", 'libelle' =>    "Tanalt"],
                ['province_id' => "62", 'libelle' =>    "Targua Ntouchka"],
                ['province_id' => "62", 'libelle' =>    "Tassegdelt"],
                ['province_id' => "62", 'libelle' =>    "Tizi Ntakoucht"],

                //agadir ida outanan
                ['province_id' => "61", 'libelle' =>    "Agadir"],
                ['province_id' => "61", 'libelle' =>    "Amskroud"],
                ['province_id' => "61", 'libelle' =>    "Aourir"],
                ['province_id' => "61", 'libelle' =>    "Aqesri"],
                ['province_id' => "61", 'libelle' =>    "Aziar"],
                ['province_id' => "61", 'libelle' =>    "Drargua"],
                ['province_id' => "61", 'libelle' =>    "Idmine"],
                ['province_id' => "61", 'libelle' =>    "Imouzzer Ida Outanan"],
                ['province_id' => "61", 'libelle' =>    "Imsouane"],
                ['province_id' => "61", 'libelle' =>    "Tadrart"],
                ['province_id' => "61", 'libelle' =>    "Taghazout"],
                ['province_id' => "61", 'libelle' =>    "Tamri"],
                ['province_id' => "61", 'libelle' =>    "Tiqqi"],


                //inzegan ait melloul
                ['province_id' => "63", 'libelle' =>    "Ait Melloul"],
                ['province_id' => "63", 'libelle' =>    "Dcheira El Jihadia"],
                ['province_id' => "63", 'libelle' =>    "Inezgane"],
                ['province_id' => "63", 'libelle' =>    "Lqliâa"],
                ['province_id' => "63", 'libelle' =>    "Oulad Dahou"],
                ['province_id' => "63", 'libelle' =>    "Temsia"],



                //TATA
                ['province_id' => "60", 'libelle' =>    "Adis"],
                ['province_id' => "60", 'libelle' =>    "Aguinane"],
                ['province_id' => "60", 'libelle' =>    "Ait Ouabelli"],
                ['province_id' => "60", 'libelle' =>    "Akka"],
                ['province_id' => "60", 'libelle' =>    "Akka Ighane"],
                ['province_id' => "60", 'libelle' =>    "Allougoum"],
                ['province_id' => "60", 'libelle' =>    "Fam El Hisn"],
                ['province_id' => "60", 'libelle' =>    "Foum Zguid"],
                ['province_id' => "60", 'libelle' =>    "Ibn Yacoub"],
                ['province_id' => "60", 'libelle' =>    "Issafen"],
                ['province_id' => "60", 'libelle' =>    "Kasbat Sidi Abdellah Ben M'barek"],
                ['province_id' => "60", 'libelle' =>    "Oum El Guerdane"],
                ['province_id' => "60", 'libelle' =>    "Tagmout"],
                ['province_id' => "60", 'libelle' =>    "Tamanarte"],
                ['province_id' => "60", 'libelle' =>    "Tata"],
                ['province_id' => "60", 'libelle' =>    "Tigzmerte"],
                ['province_id' => "60", 'libelle' =>    "Tissint"],
                ['province_id' => "60", 'libelle' =>    "Tizaghte"],
                ['province_id' => "60", 'libelle' =>    "Tizounine"],
                ['province_id' => "60", 'libelle' =>    "Tlite"],


                // taroudant
                ['province_id' => "65", 'libelle' =>    "Agadir Melloul"],
                ['province_id' => "65", 'libelle' =>    "Ahl Ramel"],
                ['province_id' => "65", 'libelle' =>    "Ahl Tifnoute"],
                ['province_id' => "65", 'libelle' =>    "Ahmar Laglalcha"],
                ['province_id' => "65", 'libelle' =>    "Ait Abdallah"],
                ['province_id' => "65", 'libelle' =>    "Ait Iaâza "],
                ['province_id' => "65", 'libelle' =>    "Ait Igas"],
                ['province_id' => "65", 'libelle' =>    "Ait Makhlouf"],
                ['province_id' => "65", 'libelle' =>    "Amalou"],
                ['province_id' => "65", 'libelle' =>    "Aoulouz"],
                ['province_id' => "65", 'libelle' =>    "Arazane"],
                ['province_id' => "65", 'libelle' =>    "Argana"],
                ['province_id' => "65", 'libelle' =>    "Askaouen"],
                ['province_id' => "65", 'libelle' =>    "Assads"],
                ['province_id' => "65", 'libelle' =>    "Assaisse"],
                ['province_id' => "65", 'libelle' =>    "Assaki"],
                ['province_id' => "65", 'libelle' =>    "Azaghar N'irs"],
                ['province_id' => "65", 'libelle' =>    "Azrar"],
                ['province_id' => "65", 'libelle' =>    "Bigoudine"],
                ['province_id' => "65", 'libelle' =>    "Bounrar"],
                ['province_id' => "65", 'libelle' =>    "Eddir"],
                ['province_id' => "65", 'libelle' =>    "El Faid"],
                ['province_id' => "65", 'libelle' =>    "El Guerdane"],
                ['province_id' => "65", 'libelle' =>    "El Koudia El Beida"],
                ['province_id' => "65", 'libelle' =>    "Freija"],
                ['province_id' => "65", 'libelle' =>    "Ida Ou Gailal"],
                ['province_id' => "65", 'libelle' =>    "Ida Ou Moumen"],
                ['province_id' => "65", 'libelle' =>    "Ida Ougoummad"],
                ['province_id' => "65", 'libelle' =>    "Igli"],
                ['province_id' => "65", 'libelle' =>    "Igoudar Mnabha"],
                ['province_id' => "65", 'libelle' =>    "Iguidi"],
                ['province_id' => "65", 'libelle' =>    "Imaouen"],
                ['province_id' => "65", 'libelle' =>    "Imi N'tayart"],
                ['province_id' => "65", 'libelle' =>    "Imilmaiss"],
                ['province_id' => "65", 'libelle' =>    "Imoulass"],
                ['province_id' => "65", 'libelle' =>    "Irherm"],
                ['province_id' => "65", 'libelle' =>    "Issen"],
                ['province_id' => "65", 'libelle' =>    "Lagfifat"],
                ['province_id' => "65", 'libelle' =>    "Lakhnafif"],
                ['province_id' => "65", 'libelle' =>    "Lamhadi"],
                ['province_id' => "65", 'libelle' =>    "Lamhara"],
                ['province_id' => "65", 'libelle' =>    "Lamnizla"],
                ['province_id' => "65", 'libelle' =>    "Machraa El Ain"],
                ['province_id' => "65", 'libelle' =>    "Nihit"],
                ['province_id' => "65", 'libelle' =>    "Oualqadi"],
                ['province_id' => "65", 'libelle' =>    "Oulad Aissa"],
                ['province_id' => "65", 'libelle' =>    "Oulad Berhil"],
                ['province_id' => "65", 'libelle' =>    "Oulad Teima"],
                ['province_id' => "65", 'libelle' =>    "Ouneine"],
                ['province_id' => "65", 'libelle' =>    "Ouzioua"],
                ['province_id' => "65", 'libelle' =>    "Sidi Abdellah Ou Said"],
                ['province_id' => "65", 'libelle' =>    "Sidi Ahmed Ou Abdallah"],
                ['province_id' => "65", 'libelle' =>    "Sidi Ahmed Ou Amar"],
                ['province_id' => "65", 'libelle' =>    "Sidi Boaal"],
                ['province_id' => "65", 'libelle' =>    "Sidi Borja"],
                ['province_id' => "65", 'libelle' =>    "Sidi Boumoussa"],
                ['province_id' => "65", 'libelle' =>    "Sidi Dahmane"],
                ['province_id' => "65", 'libelle' =>    "Sidi Hsaine"],
                ['province_id' => "65", 'libelle' =>    "Sidi Moussa Lhamri"],
                ['province_id' => "65", 'libelle' =>    "Sidi Mzal"],
                ['province_id' => "65", 'libelle' =>    "Sidi Ouaaziz"],
                ['province_id' => "65", 'libelle' =>    "Tabia"],
                ['province_id' => "65", 'libelle' =>    "Tafingoult"],
                ['province_id' => "65", 'libelle' =>    "Tafraouten"],
                ['province_id' => "65", 'libelle' =>    "Talgjount"],
                ['province_id' => "65", 'libelle' =>    "Taliouine"],
                ['province_id' => "65", 'libelle' =>    "Talmakante"],
                ['province_id' => "65", 'libelle' =>    "Tamaloukte"],
                ['province_id' => "65", 'libelle' =>    "Taouyalte"],
                ['province_id' => "65", 'libelle' =>    "Taroudant"],
                ['province_id' => "65", 'libelle' =>    "Tassousfi"],
                ['province_id' => "65", 'libelle' =>    "Tataoute"],
                ['province_id' => "65", 'libelle' =>    "Tazemmourt"],
                ['province_id' => "65", 'libelle' =>    "Tidsi Nissendalene"],
                ['province_id' => "65", 'libelle' =>    "Tigouga"],
                ['province_id' => "65", 'libelle' =>    "Tindine"],
                ['province_id' => "65", 'libelle' =>    "Tinzart"],
                ['province_id' => "65", 'libelle' =>    "Tiout"],
                ['province_id' => "65", 'libelle' =>    "Tisfane"],
                ['province_id' => "65", 'libelle' =>    "Tisrasse"],
                ['province_id' => "65", 'libelle' =>    "Tizgzaouine"],
                ['province_id' => "65", 'libelle' =>    "Tizi N'test"],
                ['province_id' => "65", 'libelle' =>    "Toubkal"],
                ['province_id' => "65", 'libelle' =>    "Toufelaazt"],
                ['province_id' => "65", 'libelle' =>    "Toughmart"],
                ['province_id' => "65", 'libelle' =>    "Toumliline"],
                ['province_id' => "65", 'libelle' =>    "Zagmouzen"],
                ['province_id' => "65", 'libelle' =>    "Zaouia Sidi Tahar"],


                //tiznit
                ['province_id' => "64", 'libelle' =>    "Afella Ighir"],
                ['province_id' => "64", 'libelle' =>    "Ait Issafen"],
                ['province_id' => "64", 'libelle' =>    "Ait Ouafqa"],
                ['province_id' => "64", 'libelle' =>    "Ammelne"],
                ['province_id' => "64", 'libelle' =>    "Anzi"],
                ['province_id' => "64", 'libelle' =>    "Arbaa Ait Ahmed"],
                ['province_id' => "64", 'libelle' =>    "Arbaa Rasmouka"],
                ['province_id' => "64", 'libelle' =>    "Arbaa Sahel"],
                ['province_id' => "64", 'libelle' =>    "Bounaamane"],
                ['province_id' => "64", 'libelle' =>    "El Maader El Kabir"],
                ['province_id' => "64", 'libelle' =>    "Ida Ou Gougmar"],
                ['province_id' => "64", 'libelle' =>    "Irigh N'tahala"],
                ['province_id' => "64", 'libelle' =>    "Ouijjane"],
                ['province_id' => "64", 'libelle' =>    "Reggada"],
                ['province_id' => "64", 'libelle' =>    "Sidi Ahmed Ou Moussa"],
                ['province_id' => "64", 'libelle' =>    "Sidi Bouabdelli"],
                ['province_id' => "64", 'libelle' =>    "Tafraout"],
                ['province_id' => "64", 'libelle' =>    "Tafraout El Mouloud"],
                ['province_id' => "64", 'libelle' =>    "Tarsouat"],
                ['province_id' => "64", 'libelle' =>    "Tassrirt"],
                ['province_id' => "64", 'libelle' =>    "Tighmi"],
                ['province_id' => "64", 'libelle' =>    "Tiznit"],
                ['province_id' => "64", 'libelle' =>    "Tizoughrane"],
                ['province_id' => "64", 'libelle' =>    "Tnine Aday"],
                ['province_id' => "64", 'libelle' =>    "Tnine Aglou"],










            ]
        );
    }
}
