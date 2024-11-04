<?php

namespace Database\Seeders;

use Database\Seeders\BlogSeed;
use Illuminate\Database\Seeder;
use Database\Seeders\PageSeeder;
use Database\Seeders\ReviewSeed;
use Database\Seeders\TimingSeed;
use Database\Seeders\GallerySeed;
use Database\Seeders\ListingSeed;
use Database\Seeders\ProductSeed;
use Database\Seeders\ServiceSeed;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ListCategorySeed;
use Database\Seeders\AppSettingsSeeder;
use Database\Seeders\BusinessDetailSeed;
use Database\Seeders\SiteSettingsSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            LocationSeeder::class,
            PackageSeeder::class,
            UserSeeder::class,
            UserPackSeeder::class,
            AppSettingsSeeder::class,
            SiteSettingsSeeder::class,
            PageSeeder::class,
            ListingSeed::class,
            ListCategorySeed::class,
            BusinessDetailSeed::class,
            ServiceSeed::class,
            ProductSeed::class,
            GallerySeed::class,
            ReviewSeed::class,
            TimingSeed::class,
            BlogSeed::class,
            PaymentSeeder::class,
        ]);
    }
}
