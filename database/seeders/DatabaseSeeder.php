<?php

namespace Database\Seeders;

use App\Models\DomainNames;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(CompanyUserTableSeeder::class);
        $this->call(DomainTableSeeder::class);
    }
}
