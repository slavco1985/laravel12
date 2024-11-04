<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'id' => 1,
                'title' => 'About Us',
                'url' => 'about-us',
                'description' => 'About Smart Directory',
                'content' => '{"time":1648996331278,"blocks":[{"id":"-mnkfH47Jg","type":"paragraph","data":{"text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat rhoncus dolor feugiat semper. Vestibulum imperdiet purus nibh, ut finibus dolor lobortis quis. Vivamus et blandit urna. Aliquam mi arcu, sagittis nec tortor vel, sollicitudin dapibus nulla. Praesent a semper magna, non cursus odio. Nulla volutpat, lacus eu tincidunt egestas, erat nisi sodales diam, et vestibulum nisl mauris venenatis metus. Morbi mattis metus eu placerat scelerisque. Cras tempor diam quis erat imperdiet, non malesuada tortor efficitur. Quisque aliquam convallis arcu, quis consequat felis sagittis quis. Cras sapien risus, cursus vel placerat non, tempus quis nulla."}},{"id":"WHq8ztwe_k","type":"paragraph","data":{"text":"Maecenas quis turpis pharetra, sollicitudin leo vel, posuere felis. Proin id congue libero. Vestibulum sit amet nulla dui. Etiam in mattis felis. Fusce luctus odio ut semper volutpat. Etiam cursus mauris eget mollis finibus. Cras varius mattis dui, vitae viverra nisi fringilla nec. Aenean tincidunt tempus risus, ut lobortis eros suscipit eget. Fusce fermentum tempus massa, nec hendrerit augue laoreet sit amet. Pellentesque eget luctus ligula, quis molestie ante."}},{"id":"WzAoUqjhcJ","type":"header","data":{"text":"Our Mission","level":2}},{"id":"bg0nP0MtAw","type":"paragraph","data":{"text":"Duis lacus libero, accumsan at volutpat et, hendrerit suscipit velit. Etiam lobortis eros tellus, in congue nisl rutrum eget. Vestibulum turpis lorem, pretium eget nunc sed, pulvinar venenatis eros. Maecenas ullamcorper nisi id tortor consequat, id molestie nunc ornare. Pellentesque viverra maximus ullamcorper. Ut tincidunt viverra velit, at feugiat lorem fringilla in. Cras egestas, arcu placerat laoreet facilisis, elit turpis ultrices ante, sit amet sagittis lectus nulla eget felis. Phasellus a ornare lacus. Ut tristique purus quis dui convallis, at tempor lectus cursus. Donec lobortis metus iaculis diam ultricies bibendum. Morbi laoreet, tortor nec hendrerit egestas, arcu tortor iaculis lacus, non rhoncus ipsum risus ac nibh. Mauris pellentesque ac ligula at lacinia. Donec ornare tortor id erat blandit, sit amet tristique elit tempor. Phasellus semper scelerisque dolor nec elementum."}},{"id":"izDk2Hk024","type":"paragraph","data":{"text":"Pellentesque mattis, risus sit amet pharetra mattis, mauris ante molestie erat, et gravida purus neque id mauris. Praesent vehicula sodales felis, eget tempor nibh ultricies at. Sed magna ex, gravida sit amet sem a, fermentum molestie risus. Pellentesque bibendum suscipit mi, ullamcorper eleifend nunc laoreet ut. Sed urna elit, vestibulum ac dolor quis, imperdiet ullamcorper ex. Donec ante justo, condimentum at vulputate a, imperdiet quis risus. Pellentesque malesuada, lacus et venenatis sodales, orci velit ullamcorper orci, ac feugiat odio neque egestas nibh. Suspendisse tincidunt, purus ac cursus rhoncus, neque eros tincidunt arcu, tempus rhoncus nibh quam sit amet purus. Integer sit amet augue eget tellus feugiat aliquam id sit amet urna."}},{"id":"A9l5DS4dPA","type":"header","data":{"text":"Our Vision","level":2}},{"id":"8WBtUHShoy","type":"paragraph","data":{"text":"Phasellus sit amet justo nec sem molestie auctor id ut diam. Vivamus non leo ornare, porta sem at, malesuada purus. Proin laoreet diam semper, accumsan tellus in, euismod nunc. Vestibulum iaculis laoreet sapien cursus convallis. Praesent a ullamcorper leo. Donec at dignissim ante. Nunc libero dui, porttitor a pretium non, eleifend eget ipsum. Phasellus pellentesque sagittis consectetur. Phasellus laoreet non ante in viverra. Aliquam luctus ultricies tortor, non mollis diam hendrerit commodo. Cras a tortor tempor, ullamcorper orci at, consectetur leo. Praesent ut consequat ante. Nulla aliquam mauris mi, id iaculis enim lacinia nec. Sed sed sapien eget justo placerat lobortis at eu tortor. Vivamus ac orci tortor."}}],"version":"2.23.2"}',
                ],
                [
                'id' => 2,
                'title' => 'Privacy Policy',
                'url' => 'privacy-policy',
                'description' => 'Privacy Policy',
                'content' => '{"time":1648996383534,"blocks":[{"id":"E4P2VvNPzq","type":"paragraph","data":{"text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit purus in condimentum mattis. Nam venenatis quam vel eros posuere, eget pulvinar felis commodo. Ut finibus tincidunt turpis tristique fermentum. Aenean quis est consequat, efficitur mauris vitae, sagittis turpis. Maecenas volutpat dui et gravida suscipit. Proin at sagittis nisl, ac pellentesque augue. Donec varius pharetra diam in tempor. Phasellus aliquet, diam condimentum laoreet semper, arcu mauris ullamcorper felis, eu sagittis ex quam in sem. Curabitur vestibulum lacus vel sagittis finibus. Vestibulum tellus tortor, fermentum ut ante a, placerat mattis ipsum. Nullam quis mauris at turpis sodales tincidunt in vel neque. Quisque et nisl a ante suscipit placerat sit amet nec mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sed finibus enim, et consequat eros. Proin tellus arcu, interdum sed blandit vitae, pulvinar a sapien. Sed diam lacus, tincidunt eu cursus eu, luctus a tellus."}},{"id":"AQq_44FVKt","type":"paragraph","data":{"text":"Vestibulum justo turpis, pharetra quis quam nec, ultricies hendrerit massa. Suspendisse sed dictum odio, a malesuada sapien. Donec venenatis, nisi vel tempor imperdiet, justo turpis aliquet ligula, id aliquet erat tellus vel nunc. Donec faucibus purus lorem, non luctus est sodales sit amet. Nam malesuada libero pulvinar purus elementum, sollicitudin vulputate risus posuere. Vivamus suscipit dolor dapibus tortor tempor accumsan. Phasellus a lacus interdum, dictum augue ut, semper ipsum. Praesent id orci luctus, semper magna id, ornare nunc. Aliquam massa ex, consequat sed lacus eget, molestie volutpat nulla. Mauris consectetur arcu nisi, eget porttitor nibh pulvinar in. Proin nec luctus risus, non volutpat orci. Mauris vulputate, mauris eget molestie vulputate, nisi tortor commodo libero, vitae facilisis magna nibh ultrices lorem. Donec iaculis magna in purus luctus luctus. In vitae orci blandit mauris ultrices sollicitudin vitae at ex. Donec eu hendrerit neque, eu fermentum metus. Suspendisse sagittis porttitor urna, at laoreet leo porta sed."}},{"id":"cceQQUu5SZ","type":"paragraph","data":{"text":"Nulla condimentum vestibulum semper. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet feugiat massa sit amet hendrerit. Morbi hendrerit ex risus, sed euismod mi feugiat quis. Ut feugiat, urna at pretium posuere, eros arcu sollicitudin arcu, nec suscipit neque tortor et mauris. Duis lobortis, sem convallis semper ultricies, velit arcu rhoncus massa, id pulvinar erat ipsum quis lectus. Sed volutpat sem sit amet turpis bibendum imperdiet. Curabitur tortor dolor, finibus nec sollicitudin vel, lacinia a velit. Etiam quis gravida metus. Ut egestas fermentum diam a gravida."}}],"version":"2.23.2"}',
                ],
                [
                'id' => 3,
                'title' => 'Terms and Conditions',
                'url' => 'terms-and-conditions',
                'description' => 'Terms and Conditions',
                'content' => '{"time":1648996418077,"blocks":[],"version":"2.23.2"}',
            ],
        ]);
    }
}
