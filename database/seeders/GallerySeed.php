<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert([ 
            [
            'id' => 1,
            'image' => 'gallery/uBKver0sYoP9OVM1CCXN2XHOBwkWUi1Jng0dKdKj.jpg',
            'user_id' => 1,
            'listing_id' => 1,
            ],
            [
            'id' => 2,
            'image' => 'gallery/00MBwRvLyBtfP3v0j79OQaMocxkkE3mDqacY8UZm.jpg',
            'user_id' => 1,
            'listing_id' => 1,
            ],
            [
            'id' => 3,
            'image' => 'gallery/8gSuhNOlpk5PaAcbCYbfvlSmUHnM9SUWc7b1BJJ8.jpg',
            'user_id' => 1,
            'listing_id' => 1,
            ],
            [
            'id' => 4,
            'image' => 'gallery/eo4ZEAeW5aq71UaWzeZbXy7F4yI1rIZvLMXCCExL.png',
            'user_id' => 1,
            'listing_id' => 1,
            ],
            [
            'id' => 5,
            'image' => 'gallery/oi3FntvZkPAcC5ONe4oHppNcGqUu8Qphj97otzIi.jpg',
            'user_id' => 1,
            'listing_id' => 1,
            ],
            [
            'id' => 6,
            'image' => 'gallery/amMvxajhByQiC2ipL7rR1HC01XTklphwjz89WBb5.jpg',
            'user_id' => 1,
            'listing_id' => 2,
            ],
            [
            'id' => 7,
            'image' => 'gallery/jkwlo6SH7GLy2bNeHlh6tmgG92R2MQHI9CBspCHD.jpg',
            'user_id' => 1,
            'listing_id' => 2,
            ],
            [
            'id' => 8,
            'image' => 'gallery/n4XxJ7vlUKpzeksKXn8d4EdHo31miHNDnVVK0Fi5.jpg',
            'user_id' => 1,
            'listing_id' => 2,
            ],
            [
            'id' => 9,
            'image' => 'gallery/TLloQeSCJQ4fKb7KInS9HsvD9yIAiUKk9hr5RlIY.jpg',
            'user_id' => 2,
            'listing_id' => 4,
            ],
            [
            'id' => 10,
            'image' => 'gallery/CrdGiNQILojYWXfetbutHcWkUNj3gKsPHbECOz4I.jpg',
            'user_id' => 2,
            'listing_id' => 4,
            ],
            [
            'id' => 11,
            'image' => 'gallery/zfMv9hyk5hBLmy4W35h1nEgndp0Q2OIVZ7TnBb73.jpg',
            'user_id' => 2,
            'listing_id' => 4,
            ],
            [
            'id' => 12,
            'image' => 'gallery/zZ2u3HBdzsAjrudksMUd4GWlrcSO0V5KBC3u3zXW.jpg',
            'user_id' => 2,
            'listing_id' => 4,
            ],
            [
            'id' => 13,
            'image' => 'gallery/lMkUAXugjYUOcj3FZ8tGtwmEJo4gUSQuALnaNSvU.jpg',
            'user_id' => 2,
            'listing_id' => 4,
            ],
            [
            'id' => 15,
            'image' => 'gallery/sXbqYqJerTnwRiUZ1hXFDcMzfHe0EpTOhUsrgdXI.jpg',
            'user_id' => 1,
            'listing_id' => 5,
            ],
            [
            'id' => 16,
            'image' => 'gallery/TU6hzJgszJGk7bKdo6QYVHJ2NIwxlbvIBaVTTqQT.jpg',
            'user_id' => 1,
            'listing_id' => 5,
            ],
            [
            'id' => 17,
            'image' => 'gallery/IyA8UVlRWz6fTy2FqPwjXOWX3yhlOh8C0xZnJrTc.jpg',
            'user_id' => 1,
            'listing_id' => 5,
            ],
            [
            'id' => 18,
            'image' => 'gallery/f5iIEbBRd0o6oWVKG6oeAm80Zkw34YcvlAY8HLRo.jpg',
            'user_id' => 1,
            'listing_id' => 5,
            ],
            [
            'id' => 19,
            'image' => 'gallery/I71HKUNgtjy3QgoToEinRO4E9KOkscBXIj6OM7KP.jpg',
            'user_id' => 1,
            'listing_id' => 5,
            ],
            [
            'id' => 20,
            'image' => 'gallery/wXszsI25dRsbkgQ2V52Cc3GKOnhSi1OmJJhhwPLX.jpg',
            'user_id' => 1,
            'listing_id' => 5,
            ],
            [
            'id' => 21,
            'image' => 'gallery/JpDWLwulzZp4mnJ2ViiJldIyk3MR5hCr1TMtWGWS.jpg',
            'user_id' => 2,
            'listing_id' => 6,
            ],
            [
            'id' => 22,
            'image' => 'gallery/6Y3fh0FAkDmpByG6ias31otCGlb3FulZPVW76WU7.jpg',
            'user_id' => 2,
            'listing_id' => 6,
            ],
            [
            'id' => 23,
            'image' => 'gallery/V0xNuenIKMaYACR3fPvYzAzJVnRpUD8hQgL3AaLG.jpg',
            'user_id' => 2,
            'listing_id' => 6,
            ],
            [
            'id' => 24,
            'image' => 'gallery/kjxU5zmkqpKG4vy73MpAYjeVTb0Ac6Ry5tJMjtAY.jpg',
            'user_id' => 1,
            'listing_id' => 7,
            ],
            [
            'id' => 25,
            'image' => 'gallery/s3yjBgmNrM2bqpeLGrYCv3kyfjeuclj3lOQx78YQ.jpg',
            'user_id' => 1,
            'listing_id' => 7,
            ],
            [
            'id' => 26,
            'image' => 'gallery/fM0CkX2VYE7RT2bw8rmWq5KkReMemoxDkWl8HZ0d.jpg',
            'user_id' => 1,
            'listing_id' => 7,
            ],
            [
            'id' => 27,
            'image' => 'gallery/hheV4nuMBxOUetAaeQFE71H0cKeY3BQJbpyTnnli.jpg',
            'user_id' => 1,
            'listing_id' => 7,
            ],
            [
            'id' => 28,
            'image' => 'gallery/IEKgtd53xNdlJ794pEiLPcM1s87KSCjW9MvPktXV.jpg',
            'user_id' => 1,
            'listing_id' => 7,
            ],
            [
            'id' => 29,
            'image' => 'gallery/JY6NkONPE5SxsetO10UUoc9j8PwCV0S6bV52Dfm0.jpg',
            'user_id' => 1,
            'listing_id' => 3,
            ],
            [
            'id' => 30,
            'image' => 'gallery/b7k5oTTX8u1vfy3wvafLtTngGec2L0MBAP4UTyNb.jpg',
            'user_id' => 1,
            'listing_id' => 3,
            ],
            [
            'id' => 31,
            'image' => 'gallery/uSXYsD7ayrETdsuOcOPbPqxJ4yjmJf3SmZGGenBJ.jpg',
            'user_id' => 1,
            'listing_id' => 3,
            ],
            [
            'id' => 32,
            'image' => 'gallery/eCd9zYr6zkmPjemzRX7383v2P20BX1dEeI7b3BEa.jpg',
            'user_id' => 1,
            'listing_id' => 3,
            ],
            [
            'id' => 33,
            'image' => 'gallery/HE4WMtOd05rG8hABUEc2Ud7UNZy8BT3j5DA5tcJD.jpg',
            'user_id' => 1,
            'listing_id' => 3,
            ],
            [
            'id' => 34,
            'image' => 'gallery/uBKver0sYoP9OVM1CCXN2XHOBwkWUi1Jng0dKdKj.jpg',
            'user_id' => 1,
            'listing_id' => 8,
            ],
            [
            'id' => 35,
            'image' => 'gallery/00MBwRvLyBtfP3v0j79OQaMocxkkE3mDqacY8UZm.jpg',
            'user_id' => 1,
            'listing_id' => 8,
            ],
            [
            'id' => 36,
            'image' => 'gallery/8gSuhNOlpk5PaAcbCYbfvlSmUHnM9SUWc7b1BJJ8.jpg',
            'user_id' => 1,
            'listing_id' => 8,
            ],
            [
            'id' => 37,
            'image' => 'gallery/eo4ZEAeW5aq71UaWzeZbXy7F4yI1rIZvLMXCCExL.png',
            'user_id' => 1,
            'listing_id' => 8,
            ],
            [
            'id' => 38,
            'image' => 'gallery/oi3FntvZkPAcC5ONe4oHppNcGqUu8Qphj97otzIi.jpg',
            'user_id' => 1,
            'listing_id' => 8,
            ],
            [
            'id' => 39,
            'image' => 'gallery/amMvxajhByQiC2ipL7rR1HC01XTklphwjz89WBb5.jpg',
            'user_id' => 2,
            'listing_id' => 9,
            ],
            [
            'id' => 40,
            'image' => 'gallery/jkwlo6SH7GLy2bNeHlh6tmgG92R2MQHI9CBspCHD.jpg',
            'user_id' => 2,
            'listing_id' => 9,
            ],
            [
            'id' => 41,
            'image' => 'gallery/n4XxJ7vlUKpzeksKXn8d4EdHo31miHNDnVVK0Fi5.jpg',
            'user_id' => 2,
            'listing_id' => 9,
            ],
            [
            'id' => 42,
            'image' => 'gallery/sXbqYqJerTnwRiUZ1hXFDcMzfHe0EpTOhUsrgdXI.jpg',
            'user_id' => 1,
            'listing_id' => 11,
            ],
            [
            'id' => 43,
            'image' => 'gallery/TU6hzJgszJGk7bKdo6QYVHJ2NIwxlbvIBaVTTqQT.jpg',
            'user_id' => 1,
            'listing_id' => 11,
            ],
            [
            'id' => 44,
            'image' => 'gallery/IyA8UVlRWz6fTy2FqPwjXOWX3yhlOh8C0xZnJrTc.jpg',
            'user_id' => 1,
            'listing_id' => 11,
            ],
            [
            'id' => 45,
            'image' => 'gallery/f5iIEbBRd0o6oWVKG6oeAm80Zkw34YcvlAY8HLRo.jpg',
            'user_id' => 1,
            'listing_id' => 11,
            ],
            [
            'id' => 46,
            'image' => 'gallery/I71HKUNgtjy3QgoToEinRO4E9KOkscBXIj6OM7KP.jpg',
            'user_id' => 1,
            'listing_id' => 11,
            ],
            [
            'id' => 47,
            'image' => 'gallery/wXszsI25dRsbkgQ2V52Cc3GKOnhSi1OmJJhhwPLX.jpg',
            'user_id' => 1,
            'listing_id' => 11,
            ],
            [
            'id' => 48,
            'image' => 'gallery/JpDWLwulzZp4mnJ2ViiJldIyk3MR5hCr1TMtWGWS.jpg',
            'user_id' => 1,
            'listing_id' => 12,
            ],
            [
            'id' => 49,
            'image' => 'gallery/6Y3fh0FAkDmpByG6ias31otCGlb3FulZPVW76WU7.jpg',
            'user_id' => 1,
            'listing_id' => 12,
            ],
            [
            'id' => 50,
            'image' => 'gallery/V0xNuenIKMaYACR3fPvYzAzJVnRpUD8hQgL3AaLG.jpg',
            'user_id' => 1,
            'listing_id' => 12,
            ],
            [
            'id' => 51,
            'image' => 'gallery/uBKver0sYoP9OVM1CCXN2XHOBwkWUi1Jng0dKdKj.jpg',
            'user_id' => 2,
            'listing_id' => 13,
            ],
            [
            'id' => 52,
            'image' => 'gallery/00MBwRvLyBtfP3v0j79OQaMocxkkE3mDqacY8UZm.jpg',
            'user_id' => 2,
            'listing_id' => 13,
            ],
            [
            'id' => 53,
            'image' => 'gallery/8gSuhNOlpk5PaAcbCYbfvlSmUHnM9SUWc7b1BJJ8.jpg',
            'user_id' => 2,
            'listing_id' => 3,
            ],
            [
            'id' => 54,
            'image' => 'gallery/eo4ZEAeW5aq71UaWzeZbXy7F4yI1rIZvLMXCCExL.png',
            'user_id' => 2,
            'listing_id' => 13,
            ],
            [
            'id' => 55,
            'image' => 'gallery/oi3FntvZkPAcC5ONe4oHppNcGqUu8Qphj97otzIi.jpg',
            'user_id' => 2,
            'listing_id' => 13,
            ],
            [
            'id' => 56,
            'image' => 'gallery/kjxU5zmkqpKG4vy73MpAYjeVTb0Ac6Ry5tJMjtAY.jpg',
            'user_id' => 1,
            'listing_id' => 14,
            ],
            [
            'id' => 57,
            'image' => 'gallery/s3yjBgmNrM2bqpeLGrYCv3kyfjeuclj3lOQx78YQ.jpg',
            'user_id' => 1,
            'listing_id' => 14,
            ],
            [
            'id' => 58,
            'image' => 'gallery/fM0CkX2VYE7RT2bw8rmWq5KkReMemoxDkWl8HZ0d.jpg',
            'user_id' => 1,
            'listing_id' => 14,
            ],
            [
            'id' => 59,
            'image' => 'gallery/hheV4nuMBxOUetAaeQFE71H0cKeY3BQJbpyTnnli.jpg',
            'user_id' => 1,
            'listing_id' => 14,
            ],
            [
            'id' => 60,
            'image' => 'gallery/IEKgtd53xNdlJ794pEiLPcM1s87KSCjW9MvPktXV.jpg',
            'user_id' => 1,
            'listing_id' => 14,
            ],
                
        ]);
    }
}
