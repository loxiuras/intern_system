<?php

namespace Database\Seeders;

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
        $this->call(HostTableSeeder::class);
        $this->call(DomainTableSeeder::class);
        $this->call(DayTableSeeder::class);
        $this->call(PasswordTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(ManualTableSeeder::class);
        $this->call(ContentTableSeeder::class);
    }
}
