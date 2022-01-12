<?php

namespace Database\Seeders;

use App\Models\Host;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostTableSeeder extends Seeder {

    public function run()
    {
        DB::table('hosts')->delete();

        Host::create([
            'name'       => 'DirectAdmin',
            'ip_address' => '109.237.216.161',
            'active'     => 1,
        ]);

        Host::create([
            'name'       => 'VirtualMin',
            'ip_address' => '91.230.51.182',
            'active'     => 1,
        ]);

        Host::create([
            'name'       => 'VPS-01',
            'ip_address' => '37.34.63.126',
            'active'     => 1,
        ]);

        Host::create([
            'name'       => 'TransIP (WordPress)',
            'ip_address' => '136.144.154.35',
            'active'     => 1,
        ]);
    }

}
