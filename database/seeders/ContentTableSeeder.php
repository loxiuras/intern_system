<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('contents')->delete();

        Content::create([
            'type'        => 'manual',
            'record_id'   => 1,
            'title'       => 'Faucibus sem sed',
            'description' => '<p>Donec maximus, mi nec tincidunt porta, diam est sodales lectus, ut interdum dui nisl vitae arcu. Sed vitae libero fringilla, malesuada dui eu, pellentesque dolor. Aenean quis eleifend est. Duis tristique lacus ornare, faucibus sem sed, maximus turpis. Fusce porta metus sed tincidunt euismod. Maecenas et viverra leo. Morbi a porta lectus, eget pellentesque erat. Proin lacinia in nunc at maximus. Aliquam lacus mauris, mollis ut libero in, feugiat pulvinar arcu. Donec posuere malesuada orci et condimentum. Ut a luctus dui, vitae auctor ex. Praesent vulputate, leo in lobortis dignissim, lacus justo ornare turpis, sed laoreet leo est scelerisque lorem. Donec dignissim ultricies mi nec suscipit. Maecenas imperdiet at massa non cursus. Duis congue, eros blandit porta congue, leo est porta augue, et eleifend ex erat sed nunc. Vestibulum elementum eget tellus non tristique.</p>',
            'active'      => 1,
        ]);

        Content::create([
            'type'        => 'manual',
            'record_id'   => 1,
            'title'       => 'Suspendisse at erat sit',
            'description' => '<p>DUt id est vel lacus euismod euismod. Suspendisse at erat sit amet felis pretium pulvinar vel id arcu. Aliquam lobortis, mauris eget viverra fringilla, ipsum ligula pretium tellus, a luctus libero metus eu orci. Sed venenatis, augue in placerat scelerisque, turpis nibh varius enim, sit amet interdum ante orci id lacus. In sodales lobortis aliquet. Morbi a faucibus turpis, ut dignissim lacus. Etiam dignissim id augue et accumsan. Fusce in ipsum lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac blandit nunc, at vulputate lacus. Aenean luctus tincidunt dui, sed iaculis purus tincidunt nec. Curabitur id turpis et ante semper venenatis ut vitae tellus. Sed maximus dui quis faucibus egestas.</p>',
            'active'      => 0,
        ]);

        Content::create([
            'type'        => 'manual',
            'record_id'   => 1,
            'title'       => 'Fusce ut odio vehicula',
            'description' => '<p>Aenean semper euismod sapien ut eleifend. Curabitur vehicula felis at dui hendrerit dignissim. Integer vulputate ligula non malesuada gravida. Nunc bibendum consequat quam, ut cursus nisi faucibus et. Fusce ut odio vehicula, bibendum augue ornare, dapibus quam. Pellentesque porta leo semper scelerisque imperdiet. Pellentesque sodales turpis vitae arcu scelerisque, id mattis magna convallis. Etiam sit amet nisi augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer at enim libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed hendrerit iaculis porta. Vivamus vel erat fermentum quam feugiat elementum. Suspendisse in vehicula sem. Fusce at ornare odio, non pulvinar sapien.</p>',
            'active'      => 1,
        ]);
    }
}
