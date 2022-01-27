<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tickets')->delete();

        $insertBulkData = true;
        if ( $insertBulkData ) {
            Ticket::factory()
                ->count(100)
                ->create();
        }
    }

}
