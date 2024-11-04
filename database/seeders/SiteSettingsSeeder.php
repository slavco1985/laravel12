<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_infos')->insert([
            [
                'id' => 1,
                'logo' => 'logo/smartdirectory_logo.png',
                'fav' => 'fav/smartdirectory_fav.png',
                'mobile_no_1' => '+987 98676789',
                'mobile_no_2' => '+044 878898789',
                'email_1' => 'info@smartdirectory.com',
                'email_2' => 'sales@smartdirectory.com',
                'web' => 'https://smarteyeapps.com',
                'address' => '5-34, Rosestreet, Ramson Motycarony, Torranto',
                'title' => 'Smart Directory - Find top rates services and business near you',
                'meta' => 'smart-directory, business directory, business listing',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat rhoncus dolor feugiat semper. Vestibulum imperdiet purus nibh, ut finibus dolor lobortis quis. Vivamus et blandit urna. Aliquam mi arcu, sagittis nec tortor vel',
                'fb' => 'https://facebook.com',
                'tw' => 'http://twitter.com',
                'li' => 'https://linkedin.com',
                'ins' => 'http://instagram.com',
                'yt' => 'https://youtube.com',
                'pin' => 'http://pinterest.com',
            ],
        ]);
    }
}
