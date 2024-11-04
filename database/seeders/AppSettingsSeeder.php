<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_settings')->insert([
            [
                'id' => 1,
                'email_activation' => 0,
                'currency' => 'USD/$',
                'currency_code' => 'USD',
                'currency_symbol' => '$',
                'currency_type' => 'Symbol',
                'messsage_notification' => 1,
                'review_notification' => 0,
                'list_view' => 12,
                'grid_view' => 12,
                'blog' => 12,
                'featured_list' => 3,
                'latest_list' => 3,
            ]
        ]);
    }
}
