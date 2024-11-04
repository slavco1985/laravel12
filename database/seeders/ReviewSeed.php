<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([ 
            [
            'id' => 3,
            'user_id' => 1,
            'listing_id' => 1,
            'rating' => 4,
            'message' => 'One of the Dest Compute Sales and Services centre in work with. have a great experience with this dell computer service center',
            ],
            [
            'id' => 4,
            'user_id' => 1,
            'listing_id' => 1,
            'rating' => 2,
            'message' => '. Maecenas non suscipit dui, vitae malesuada nibh. Nunc justo nisi, mattis ut semper sit amet, congue ut risus',
            ],
            [
            'id' => 5,
            'user_id' => 1,
            'listing_id' => 11,
            'rating' => 3,
            'message' => '. Maecenas non suscipit dui, vitae malesuada nibh. Nunc justo nisi, mattis ut semper sit amet, congue ut risus',
            ],
            [
            'id' => 6,
            'user_id' => 1,
            'listing_id' => 11,
            'rating' => 4,
            'message' => 'aoreet tincidunt. Nulla laoreet libero vitae turpis molestie gravida. Donec bibendum convallis neque ut laoreet. Sed nec diam finibus, rutrum nisl vitae, auctor diam',
            ],
            [
            'id' => 7,
            'user_id' => 1,
            'listing_id' => 11,
            'rating' => 4,
            'message' => 'ras id laoreet lacus. Cras ut tortor imperdiet, egestas ligula ac, dapibus augue.',
            ],
            [
            'id' => 8,
            'user_id' => 1,
            'listing_id' => 6,
            'rating' => 5,
            'message' => 'ras id laoreet lacus. Cras ut tortor imperdiet, egestas ligula ac, dapibus augue.',
            ],
            [
            'id' => 9,
            'user_id' => 1,
            'listing_id' => 4,
            'rating' => 4,
            'message' => 'ras id laoreet lacus. Cras ut tortor imperdiet, egestas ligula ac, dapibus augue.',
            ],
            [
            'id' => 10,
            'user_id' => 1,
            'listing_id' => 2,
            'rating' => 5,
            'message' => 'laoreet ac aliquet in, imperdiet ut mauris. Maecenas nec varius velit, auctor volutpat eros',
            ],
            [
            'id' => 11,
            'user_id' => 1,
            'listing_id' => 8,
            'rating' => 3,
            'message' => 'am ultricies fringilla lacus sed convallis. Suspendisse augue sapien, consectetur sed efficitur',
            ],
            [
            'id' => 12,
            'user_id' => 1,
            'listing_id' => 14,
            'rating' => 3,
            'message' => 'Pellentesque laoreet faucibus est, sit amet placerat leo tristique placerat. Quisque molestie, ex ut feugiat semper,',
            ],
            [
            'id' => 13,
            'user_id' => 2,
            'listing_id' => 11,
            'rating' => 4,
            'message' => 'Cras ut tortor imperdiet, egestas ligula ac, dapibus augue. Proin auctor congue arcu',
            ],
            [
            'id' => 14,
            'user_id' => 2,
            'listing_id' => 4,
            'rating' => 3,
            'message' => 'Cras ut tortor imperdiet, egestas ligula ac, dapibus augue. Proin auctor congue arcu',
            ],
            [
            'id' => 15,
            'user_id' => 2,
            'listing_id' => 2,
            'rating' => 3,
            'message' => 'Cras ut tortor imperdiet, egestas ligula ac, dapibus augue. Proin auctor congue arcu',
            ],
            [
            'id' => 16,
            'user_id' => 2,
            'listing_id' => 13,
            'rating' => 4,
            'message' => 'enean vel nisi vel neque gravida blandit. Nulla nec ipsum eros. Phasellus turpis lacus, eleifend vel nisl sed, vulputate cursus massa',
            ],
            [
            'id' => 17,
            'user_id' => 2,
            'listing_id' => 13,
            'rating' => 5,
            'message' => 'Pellentesque eu molestie velit. Morbi quis elit sagittis, maximus tellus et, cursus ante. Mauris eu nunc felis.',
            ],
            [
            'id' => 18,
            'user_id' => 2,
            'listing_id' => 12,
            'rating' => 3,
            'message' => 'Pellentesque eu molestie velit. Morbi quis elit sagittis, maximus tellus et, cursus ante. Mauris eu nunc felis.',
            ],
        ]);
    }
}
