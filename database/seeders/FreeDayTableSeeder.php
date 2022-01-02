<?php

namespace Database\Seeders;

use App\Models\FreeDay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreeDayTableSeeder extends Seeder {

    public function run()
    {
        DB::table('free_days')->delete();

        FreeDay::create([
            'user_id'           => 1,
            'date'              => '2022-01-01',
            'minutes'           => 60,
            'title'             => 'Test day #1',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
            'accepted_datetime' => '2022-01-01 10:00:00',
            'accepted_user_id'  => 1,
        ]);

        FreeDay::create([
            'user_id'           => 1,
            'date'              => '2022-01-02',
            'minutes'           => 120,
            'title'             => 'Test day #2',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
        ]);

        FreeDay::create([
            'user_id'           => 1,
            'date'              => '2022-01-03',
            'minutes'           => 180,
            'title'             => 'Test day #3',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
        ]);
    }

}
