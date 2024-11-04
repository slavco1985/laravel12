<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'id' => 1,
                'name' => 'New York',
                'image' => 'city/IrkzIIzTX6oJ85VHHXHkFJZbnOIMfKPA2J1JjTOA.jpg',
                'url' => 'new-york',
                'featured' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Sydney',
                'image' => 'city/YhYbodvrYd2QT9NguIDTGduKPVHKfj868vzZnkYE.jpg',
                'url' => 'sydney',
                'featured' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Beijing',
                'image' => 'city/1cgtic20cdx6gAEWUn7PktZnhfYyZhd93CWVV8nG.jpg',
                'url' => 'beijing',
                'featured' => 1,
            ],
            [
                'id' => 4,
                'name' => 'New Delhi',
                'image' => 'city/dqdCv1Wb01Vgo3S1mb2B4QUIesBop79fZtn9rgi3.jpg',
                'url' => 'new-delhi',
                'featured' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Tokyo',
                'image' => 'city/mmHgFuhhlQfiY5ybR8uhM6bH21ZU1VqktxaDFIym.jpg',
                'url' => 'tokyo',
                'featured' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Toranto',
                'image' => 'city/1Z40n4m1rhPjoVkBTWS2zqTsaCKBdX2kxDKRV0wW.jpg',
                'url' => 'toranto',
                'featured' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Mumbai',
                'image' => 'city/Oca130BiIDF0ojxsjy5El92U5wXsH1VVVgUHzAiq.jpg',
                'url' => 'mumbai',
                'featured' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Italy',
                'image' => 'city/jjEOSA5Mpmc5w0G80pcoz9o0TC9RSVds609fULLu.jpg',
                'url' => 'italy',
                'featured' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Thailand',
                'image' => 'city/0vyPQ7r2W0kBc7lKH0GhEJUQylCRMSxjSdtk0J4H.jpg',
                'url' => 'thailand',
                'featured' => 0,
            ],
            [
                'id' => 10,
                'name' => 'Maldives-1',
                'image' => NULL,
                'url' => 'maldives-1',
                'featured' => 0,
            ],
            [
                'id' => 11,
                'name' => 'Singapore',
                'image' => 'city/ilvhbP0oUT8CSJvReRSopvqkI19kjPgvQyBx0bhU.jpg',
                'url' => 'singapore',
                'featured' => 0,
            ],
            [
                'id' => 12,
                'name' => 'Londion',
                'image' => NULL,
                'url' => 'londion',
                'featured' => 0,
            ],
        ]);
    }
}
