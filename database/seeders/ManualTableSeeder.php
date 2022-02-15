<?php

namespace Database\Seeders;

use App\Models\Manual;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManualTableSeeder extends Seeder {

    public function run()
    {
        DB::table('manuals')->delete();

        $insertBulkData = true;
        if ( $insertBulkData ) {
            Manual::factory()
                ->count(25)
                ->create();
        }
    }

}
