<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = Carbon::now()->addDays( rand( 0, 10) );
        $startDate = $date->subDays( rand( 0, 20 ) );

        return [
            'company_id'          => 1,
            'created_at'          => $this->faker->dateTime(),
            'updated_at'          => $this->faker->dateTime(),
            'created_user_id'     => 1,
            'updated_user_id'     => 2,
            'title'               => $this->faker->text( 50),
            'description'         => $this->faker->text( 300 ),
            'invoice_description' => $this->faker->text( 150 ),
            'invoice_price'       => $this->faker->numberBetween( 1000, 10000 ),
            'invoice_time'        => $this->faker->numberBetween( 60, 600 ),
            'scheduled_date'      => $startDate,
            'scheduled_end_date'  => $startDate->addDays( rand( 1, 3 ) ),
            'status'              => $this->faker->numberBetween( 1, 4 ),
            'urgent_level'        => rand( 1, 4 ),
        ];
    }
}
