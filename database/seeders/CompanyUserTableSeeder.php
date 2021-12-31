<?php

namespace Database\Seeders;

use App\Models\CompanyUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('company_users')->delete();

        CompanyUser::create([
            'company_id' => 1,
            'user_id'    => 1,
        ]);

        CompanyUser::create([
            'company_id' => 1,
            'user_id'    => 2,
        ]);
    }

}
