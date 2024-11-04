<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_gateways')->insert([
            [
                'id' => 1,
                'name' => 'Paypal',
                'image' => 'paypal.jpg',
                'slug' => 'process-transaction',
                'key' => 'AUkYcduyaa_WB2tqlWJefwnpLB4ats0IRNNI0N7N8jnmni-8ndBZqLRZhoa7fXkZ82kCHTgY91uMYpGD',
                'secret' => 'EAT33q5DWLeE4408X3sd3lEM_h6eWTYFk-N6B_JMDnZ5pc8NDT08V_zLCtLm8EujVH5ihnRyQq_JaxWR',
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Razor Pay',
                'image' => 'razorpay.jpg',
                'slug' => 'razorpay',
                'key' => 'rzp_test_U1BCjbEvwo80Kx',
                'secret' => 'CyyoHxdmVIdNpDHtSiYf9o13',
                'status' => 1,
            ],
        ]);
    }
}
