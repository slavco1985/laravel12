<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessDetailSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_details')->insert([
            [
                'id' => 1,
                'about' => '{"time":1649005307190,"blocks":[{"id":"RqmyjVa4OM","type":"paragraph","data":{"text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in felis tellus. In sapien metus, ornare ac sollicitudin non, tincidunt vel ex. Proin tincidunt nisl diam, ut tincidunt massa ultrices vitae. Aliquam auctor ex dolor, vel viverra purus rutrum vel. Aenean vitae ultricies elit. Nullam suscipit facilisis felis in ornare. Aenean luctus nibh sed auctor molestie. Curabitur tincidunt velit nec aliquet facilisis. Cras ac risus vestibulum, mattis nisi in, fringilla libero."}},{"id":"q-HGbMkfmW","type":"paragraph","data":{"text":"Integer vestibulum convallis tellus, at dapibus metus ullamcorper id. Fusce sit amet libero libero. Fusce et odio ac nisi convallis ullamcorper et ac lorem. Fusce eget metus suscipit, blandit ante eget, cursus tellus. Sed leo tellus, iaculis a metus ac, pharetra finibus enim. Phasellus in sapien eros. Pellentesque ultrices dolor eu magna luctus, quis aliquam ipsum porttitor. Vivamus aliquam mi at rutrum accumsan. Phasellus semper eros ac lobortis eleifend."}},{"id":"iqP-N7R-pi","type":"paragraph","data":{"text":"Pellentesque a bibendum sapien. Ut viverra viverra convallis. Nunc laoreet urna tellus. Cras nec maximus dolor, in fringilla leo. Sed id quam nec sapien congue consequat a quis odio. Nulla sodales tortor nec convallis mollis. Morbi ornare elit eget leo dapibus, id tristique ipsum auctor. Aenean elit lectus, rhoncus id tincidunt id, volutpat sit amet nisi. Aenean magna est, tempus sed tortor id, eleifend ornare magna."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 1,
            ],
            [
                'id' => 2,
                'about' => '{"time":1649053164556,"blocks":[{"id":"KBakO4zKmK","type":"paragraph","data":{"text":"Sed quis metus scelerisque, porta turpis non, tristique diam. Integer vitae lorem lectus. Morbi gravida justo at neque suscipit ultricies. Vestibulum elementum ac ex vitae porttitor. Donec ligula leo, bibendum eget lectus sed, euismod venenatis turpis. Aliquam interdum velit lorem, vitae cursus magna rhoncus eu. Nam viverra arcu non mi sodales venenatis. Fusce eu turpis ac sem faucibus tempus."}},{"id":"VU1sGw8HeI","type":"paragraph","data":{"text":"Maecenas mattis lorem nunc, a vulputate sapien egestas quis. Maecenas massa risus, pellentesque vel suscipit et, pulvinar ut nibh. Proin sit amet nunc porta, interdum erat eu, laoreet lectus. Proin a ligula eu nisl eleifend porta auctor vel massa. Nullam quis enim ex. Fusce aliquet fermentum auctor. Nam tincidunt nisi vitae sodales aliquet. Nulla quis laoreet odio, et sagittis massa. Cras iaculis feugiat vestibulum. Sed fermentum nisi in dolor elementum, aliquet scelerisque eros ultricies. Quisque elementum lacinia eros. Praesent blandit eget neque quis ullamcorper. Vivamus ultricies sodales lectus, sed ornare diam tristique ac."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 2,
            ],
            [
                'id' => 3,
                'about' => '{"time":1649053856427,"blocks":[{"id":"aKLMhrXUS6","type":"paragraph","data":{"text":"Maecenas mattis lorem nunc, a vulputate sapien egestas quis. Maecenas massa risus, pellentesque vel suscipit et, pulvinar ut nibh. Proin sit amet nunc porta, interdum erat eu, laoreet lectus. Proin a ligula eu nisl eleifend porta auctor vel massa. Nullam quis enim ex. Fusce aliquet fermentum auctor. Nam tincidunt nisi vitae sodales aliquet. Nulla quis laoreet odio, et sagittis massa. Cras iaculis feugiat vestibulum. Sed fermentum nisi in dolor elementum, aliquet scelerisque eros ultricies. Quisque elementum lacinia eros. Praesent blandit eget neque quis ullamcorper. Vivamus ultricies sodales lectus, sed ornare diam tristique ac."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 3,
            ],
            [
                'id' => 4,
                'about' => '{"time":1649055526603,"blocks":[{"id":"1dnQVRNUQL","type":"paragraph","data":{"text":"Maecenas mattis lorem nunc, a vulputate sapien egestas quis. Maecenas massa risus, pellentesque vel suscipit et, pulvinar ut nibh. Proin sit amet nunc porta, interdum erat eu, laoreet lectus. Proin a ligula eu nisl eleifend porta auctor vel massa. Nullam quis enim ex. Fusce aliquet fermentum auctor. Nam tincidunt nisi vitae sodales aliquet. Nulla quis laoreet odio, et sagittis massa. Cras iaculis feugiat vestibulum. Sed fermentum nisi in dolor elementum, aliquet scelerisque eros ultricies. Quisque elementum lacinia eros. Praesent blandit eget neque quis ullamcorper. Vivamus ultricies sodales lectus, sed ornare diam tristique ac."}}],"version":"2.23.2"}',
                'user_id' => 2,
                'listing_id' => 4,
            ],
            [
                'id' => 5,
                'about' => '{"time":1649056888849,"blocks":[{"id":"I5iCvNCtcW","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 5,
            ],
            [
                'id' => 6,
                'about' => '{"time":1649058615582,"blocks":[{"id":"a7Sg08hDAv","type":"paragraph","data":{"text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac gravida dolor. Morbi non congue eros. Aliquam ultricies nibh risus. Maecenas commodo ornare dolor eu venenatis. Cras luctus ultrices ipsum, eget rhoncus velit dictum eu. Etiam et quam at quam ultrices interdum non non eros. Donec scelerisque pharetra ex non congue. Duis commodo dui consequat, vehicula dui in, ultricies nisl. Phasellus ut consectetur diam, ac bibendum risus. Nam et nibh mi. Nulla condimentum non est tristique congue."}},{"id":"SprEzb7-B4","type":"paragraph","data":{"text":"Sed quis metus scelerisque, porta turpis non, tristique diam. Integer vitae lorem lectus. Morbi gravida justo at neque suscipit ultricies. Vestibulum elementum ac ex vitae porttitor. Donec ligula leo, bibendum eget lectus sed, euismod venenatis turpis. Aliquam interdum velit lorem, vitae cursus magna rhoncus eu. Nam viverra arcu non mi sodales venenatis."}}],"version":"2.23.2"}',
                'user_id' => 2,
                'listing_id' => 6,
                ],
            [
                'id' => 7,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 7,
            ],
            [
                'id' => 8,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 8,
            ],
            [
                'id' => 9,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 2,
                'listing_id' => 9,
            ],
            [
                'id' => 10,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 2,
                'listing_id' => 10,
            ],
            [
                'id' => 11,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 11,
            ],
            [
                'id' => 12,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 12,
            ],
            [
                'id' => 13,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 2,
                'listing_id' => 13,
            ],
            [
                'id' => 14,
                'about' => '{"time":1649059047553,"blocks":[{"id":"4aRUeC20tI","type":"paragraph","data":{"text":"Morbi in leo in ipsum pellentesque congue ac vel ante. Phasellus tristique dui et eros fringilla efficitur. Pellentesque blandit dolor ut mauris commodo, quis tincidunt lorem semper. Integer ac neque diam. Fusce sed ante in nibh egestas dignissim ac id augue. In viverra euismod velit, convallis congue ex aliquet vitae. Proin vehicula tincidunt quam, ac interdum libero sollicitudin eu. Morbi gravida ultrices consequat. Phasellus erat ex, pretium eu ultrices ut, lobortis non sem. Maecenas at blandit leo, in volutpat purus. Ut elementum elit massa, nec ultrices augue varius eget. Vivamus sollicitudin fringilla sem, ac ultrices nisi condimentum sed. Duis sit amet porta dolor, vitae lobortis nisl. Aliquam egestas nunc non mollis dictum. Vivamus pretium semper sodales. Donec mollis libero dapibus, sagittis libero id, fermentum lacus."}}],"version":"2.23.2"}',
                'user_id' => 1,
                'listing_id' => 14,
            ],
        ]);
    }
}
