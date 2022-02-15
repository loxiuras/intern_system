<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ManualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference'       => strtoupper( $this->faker->text( 10) ),
            'title'           => $this->faker->text( 50),
            'created_user_id' => 1,
            'updated_user_id' => 2,
        ];
    }
}
