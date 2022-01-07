<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'name'                    => $this->faker->name(),
            'legal_name'              => $this->faker->name(),
            'street_name'             => $this->faker->streetName(),
            'house_number'            => $this->faker->numberBetween(1,1000),
            'house_number_extra'      => "",
            'postal_code'             => $this->faker->postcode(),
            'city'                    => $this->faker->city(),
            'province'                => "",
            'country'                 => $this->faker->country(),
            'telephone'               => $this->faker->unique()->phoneNumber(),
            'primary_website'         => $this->faker->unique()->domainName(),
            'primary_email'           => $this->faker->unique()->safeEmail(),
            'primary_invoice_email'   => "",
            'optional_invoice_emails' => "",
            'active'                  => 1,
        ];
    }
}
