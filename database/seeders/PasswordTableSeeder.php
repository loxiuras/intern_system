<?php

namespace Database\Seeders;

use App\Models\Password;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordTableSeeder extends Seeder {

    public function run()
    {
        DB::table('passwords')->delete();

        Password::create([
            'type'      => 'domain',
            'record_id' => '1',
            'name'      => 'FTP information',
            'username'  => 'suilichemcom',
            'password'  => 'Test123!Test123!',
            'active'    => 1,
        ]);

        Password::create([
            'type'      => 'domain',
            'record_id' => '1',
            'name'      => 'Database information',
            'username'  => 'suilichemcom',
            'password'  => 'Test123!Test123!',
            'active'    => 1,
        ]);

        Password::create([
            'type'      => 'user',
            'record_id' => '1',
            'name'      => 'API information',
            'username'  => 'user123',
            'password'  => 'Test123!Test123!',
            'active'    => 1,
        ]);

        Password::create([
            'type'      => 'user',
            'record_id' => '1',
            'name'      => 'Portal settings',
            'username'  => 'user456',
            'password'  => 'Test123!Test123!',
            'active'    => 1,
        ]);
    }
}
