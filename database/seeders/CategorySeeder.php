<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Restuarent',
                'url' => 'restuarent',
                'icon' => 'icon/dt6NPTzaLkrJ97jj8pQBvOgcwzteAnz9gcA1ldu7.png',
                'description' => 'Find Restaurants Near You Indian, Chinese, South India, Italian etc..',
                'featured' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Retail Shops',
                'url' => 'retail-shops',
                'icon' => 'icon/E9tXm2McCoxweRwl2CyHqhxBbjMOb29Av02mwUL7.png',
                'description' => 'Find the Beat packers and Movers Near You, International Packers and Movers, With city movers',
                'featured' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Health Care and Beauty',
                'url' => 'health-care-and-beauty',
                'icon' => 'icon/TuqqYqsnSGabOvsvogvWtTZETbHcI1hUcIMLBJuU.png',
                'description' => 'Find the best Spa and beauty Parlours near you. Find Beauty services in best price',
                'featured' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Furniture',
                'url' => 'furniture',
                'icon' => 'icon/HQzryCLolOqn6wlSMhYqkoWP2KiZHOHSK9DRoWWm.png',
                'description' => 'Find Best deals on Home and office furniture near you',
                'featured' => 1,
            ],
            [
                'id' =>5,
                'name' => 'Computer and Accessories',
                'url' => 'computer-and-accessories',
                'icon' => 'icon/2Qtr9IeSNe8iDkfgVW7FmKFwnNVZUcGTmasIBsOy.png',
                'description' => 'Find Computer Service Centers and Dealers near you',
                'featured' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Real Estate',
                'url' => 'real-estate',
                'icon' => 'icon/DxqtBDR3uLOXOVdpYad4Icfg78ME0VUGrVAjH6We.png',
                'description' => 'Find the best Real Estate Brokers and Land Developers near You',
                'featured' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Automobile',
                'url' => 'automobile',
                'icon' => 'icon/l6VEmggedNMZKWDEs8pLcJ1c7whOzwmW64njwJaD.png',
                'description' => 'Find Best Automobile Service center and automobile dealers near you',
                'featured' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Clothing',
                'url' => 'clothing',
                'icon' => 'icon/abxR1GARnNfYUvuNOqg1IPyzSpRQKUyq80xUvT5z.png',
                'description' => 'Find Best Cloth shops near you, Mens Womens, kids',
                'featured' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Electrical and Electronics',
                'url' => 'electrical-and-electronics',
                'icon' => 'icon/SAKCttX2eMa4uHzoN4KTYW1d9Rvp74np7pzE5RxA.png',
                'description' => 'Find the Best Electrical and Electronics store near You',
                'featured' => 1,
            ],
            [
                'id' => 10,
                'name' => 'Finance Institutes',
                'url' => 'finance-institutes',
                'icon' => 'icon/B5DWFEuUReSpEzulDe4KTpdIItKZ0DLE10VCUbOg.png',
                'description' => 'Easily. find the best finance institutes around you banks, Accounts, ATM etc..',
                'featured' => 1,
            ],
            [
                'id' => 11,
                'name' => 'Educational Institute',
                'url' => 'educational-institute',
                'icon' => 'icon/Pm5avWHie4Oo08BMiYePJckmFJca0QcrgDlDdmja.png',
                'description' => 'Find Best Educational Institutes near you. Read the Details service and Review. Choose the Right one for you',
                'featured' => 1,
            ],
            [
                'id' => 12,
                'name' => 'Web Design and Development',
                'url' => 'web-design-and-development',
                'icon' => 'icon/7LFrz7CKgxi5ID0JHwo3OUqYn23GrRpSdtEFP4xL.png',
                'description' => 'Find Best deal on Webdesign and Development Servies Near You',
                'featured' => 1,
            ],
            [
                'id' => 13,
                'name' => 'Builders',
                'url' => 'builders',
                'icon' => NULL,
                'description' => 'Builders',
                'featured' => 0,
            ],
            [
                'id' => 14,
                'name' => 'AC Service',
                'url' => 'ac-service',
                'icon' => 'icon/MVmBzduNqgNfzcg5Bfio878LQfaf5Cg88PtAsa8k.png',
                'description' => 'AC Service',
                'featured' => 0,
            ],
            [
                'id' => 15,
                'name' => 'Call Taxi',
                'url' => 'call-taxi',
                'icon' => NULL,
                'description' => 'List of Call Taxi Services',
                'featured' => 0,
            ],
        ]);
    }
}
