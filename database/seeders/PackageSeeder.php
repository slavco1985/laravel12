<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                'id' => 1,
                'name' => 'Basic Package',
                'desic' => 'This plan is for small business and startups',
                'price' => 0,
                'listing' => 3,
                'verification' => 'No',
                'message' => 'Not Allowed',
                'review' => 'No',
                'services' => 3,
                'products' => 3,
                'images' => 3,
                'validity' => 0,
            ],
            [
                'id' => 2,
                'name' => 'Stanters Pack',
                'desic' => 'This package is for medium and growing business',
                'price' => 10,
                'listing' => 10,
                'verification' => 'Yes',
                'message' => 'Allowed',
                'review' => 'Yes',
                'services' => 30,
                'products' => 30,
                'images' => 50,
                'validity' => 12,
            ],
            [
                'id' => 3,
                'name' => 'Premium Package',
                'desic' => 'For Corporate and big Business Providers',
                'price' => 50,
                'listing' => 100,
                'verification' => 'No',
                'message' => 'Allowed',
                'review' => 'Yes',
                'services' => 300,
                'products' => 300,
                'images' => 300,
                'validity' => 12,
            ],
        ]);
    }
}
