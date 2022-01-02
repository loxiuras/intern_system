<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainTableSeeder extends Seeder {

    public function run()
    {
        DB::table('domains')->delete();

        Domain::create([
            'company_id' => 1,
            'name'       => 'www.suilichem.com',
            'active'     => 1,
        ]);

        Domain::create([
            'company_id' => 1,
            'name'       => 'www.suilichem.nl',
            'parent_id'  => 1,
            'active'     => 1,
        ]);

        Domain::create([
            'company_id' => 1,
            'name'       => 'www.suilichem.eu',
            'parent_id'  => 1,
            'active'     => 1,
        ]);

        Domain::create([
            'company_id'    => 1,
            'name'          => 'www.ontwikkeldemo.nl',
            'is_production' => 0,
            'active'        => 1,
        ]);

        Domain::create([
            'company_id'    => 1,
            'name'          => 'www.vsc-demo.nl',
            'parent_id'     => 4,
            'is_production' => 0,
            'active'        => 1,
        ]);
    }

}
