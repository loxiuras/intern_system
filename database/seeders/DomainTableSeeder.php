<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainTableSeeder extends Seeder {

    const defaultPassword = 'Test123!Test123!';

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
    }

}
