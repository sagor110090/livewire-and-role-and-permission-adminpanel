<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('site_settings')->delete();
        
        \DB::table('site_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'website_name' => 'Sage Mccoy',
                'website_logo' => 'uploads/UwDZOiNpCweeqdJzJX2ndtjAxO6y2soHKCUPrRTx.png',
                'created_at' => NULL,
                'updated_at' => '2021-10-25 16:56:07',
            ),
        ));
        
        
    }
}