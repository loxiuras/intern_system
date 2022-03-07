<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

    const defaultPassword = 'Test123!Test123!';

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name'               => 'Peter',
            'insertion'          => 'van',
            'last_name'          => 'Garderen',
            'date_of_birth'      => '1998-12-01',
            'email'              => 'peter@suilichem.com',
            'telephone'          => '0624670166',
            'password'           => Hash::make(self::defaultPassword),
            'is_admin'           => 1,
            'active'             => 1,
            'picture_default_id' => 1,
            'show_in_planning_rows' => 1,
        ]);

        User::create([
            'name'               => 'Wesley',
            'last_name'          => 'Prijn',
            'date_of_birth'      => '1989-08-02',
            'email'              => 'wesley@suilichem.com',
            'telephone'          => '0640611109',
            'password'           => Hash::make(self::defaultPassword),
            'is_admin'           => 1,
            'active'             => 1,
            'picture_default_id' => 3,
            'show_in_planning_rows' => 1,
        ]);

        User::create([
            'name'               => 'Carel',
            'last_name'          => 'Worst',
            'date_of_birth'      => '1964-11-24',
            'email'              => 'carel@suilichem.com',
            'telephone'          => '0385993650640',
            'password'           => Hash::make(self::defaultPassword),
            'is_admin'           => 1,
            'active'             => 1,
            'picture_default_id' => 2,
            'show_in_planning_rows' => 0,
        ]);
    }

}
