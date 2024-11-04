<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'John Smith',
                'email' => 'johnsmith@example.com',
                'role' => 'user',
                'image' => 'HNQDwAVikQAGrZWbnbV4NDSneAS33Qm8SNxjSZp7.jpg',
                'mobile' => '91 8787 8786',
                'city' => 'Chennai',
                'address' => 'Rosestreet, Motycarony, Torranto',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 2,
                'name' => 'Reena Samuel',
                'email' => 'reenasmauel@example.com',
                'role' => 'user',
                'image' => 'iqeL3q4MenO9lPmVkWFIEm5uDaSTUA8GepztH7jn.jpg',
                'mobile' => '91 8787 8786',
                'city' => 'Chennai',
                'address' => '34-5, Kolivari, Malapali, Torranto',
                'password' => Hash::make('12345678'),
            ]
           
        ]);
    }
}
