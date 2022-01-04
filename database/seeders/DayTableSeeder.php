<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayTableSeeder extends Seeder {

    public function run()
    {
        DB::table('days')->delete();

        Day::create([
            'type'              => 'free',
            'user_id'           => 1,
            'date'              => '2022-01-01',
            'minutes'           => 60,
            'title'             => 'Test day #1',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
            'accepted_datetime' => '2022-01-01 10:00:00',
            'accepted_user_id'  => 1,
        ]);

        Day::create([
            'type'              => 'free',
            'user_id'           => 1,
            'date'              => '2022-01-02',
            'minutes'           => 120,
            'title'             => 'Test day #2',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
        ]);

        Day::create([
            'type'              => 'free',
            'user_id'           => 1,
            'date'              => '2022-01-03',
            'minutes'           => 180,
            'title'             => 'Test day #3',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
        ]);

        Day::create([
            'type'              => 'sick',
            'user_id'           => 1,
            'date'              => '2022-01-10',
            'minutes'           => 0,
            'title'             => 'Sick day #1',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
        ]);

        Day::create([
            'type'              => 'sick',
            'user_id'           => 1,
            'date'              => '2022-01-11',
            'minutes'           => 0,
            'title'             => 'Sick day #2',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
        ]);

        Day::create([
            'type'              => 'sick',
            'user_id'           => 1,
            'date'              => '2022-01-12',
            'minutes'           => 0,
            'title'             => 'Sick day #3',
            'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie pretium nisi tristique tempor. Nullam velit orci, faucibus non sollicitudin et, ultrices eu purus. Vivamus pretium nibh in consequat ultricies.',
        ]);
    }

}
