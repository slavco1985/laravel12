<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_categories')->insert([
            [
                'id' => 1,
                'category_id' => 5,
                'listing_id' => 1,
            ],
            [
                'id' => 2,
                'category_id' => 3,
                'listing_id' => 2,
            ],
            [
                'id' => 3,
                'category_id' => 2,
                'listing_id' => 3,
            ],
            [
                'id' => 4,
                'category_id' => 2,
                'listing_id' => 4,
            ],
            [
                'id' => 5,
                'category_id' => 4,
                'listing_id' => 5,
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'listing_id' => 6,
            ],
            [
                'id' => 7,
                'category_id' => 2,
                'listing_id' => 7,
            ],
            [
                'id' => 8,
                'category_id' => 5,
                'listing_id' => 8,
            ],
            [
                'id' => 9,
                'category_id' => 3,
                'listing_id' => 9,
            ],
            [
                'id' => 10,
                'category_id' => 1,
                'listing_id' => 10,
            ],
            [
                'id' => 11,
                'category_id' => 4,
                'listing_id' => 11,
            ],
            [
                'id' => 12,
                'category_id' => 1,
                'listing_id' => 12,
            ],
            [
                'id' => 13,
                'category_id' => 5,
                'listing_id' => 13,
            ],
            [
                'id' => 14,
                'category_id' => 2,
                'listing_id' => 14,
            ],
        ]);
    }
}
