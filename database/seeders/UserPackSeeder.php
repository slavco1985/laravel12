<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_packages')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'package_id' => 3,
                'expery' => '2026-03-15',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'package_id' => 3,
                'expery' => '2026-03-15',
            ]
        ]);
    }
}
