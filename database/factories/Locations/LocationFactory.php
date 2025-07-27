<?php

namespace Database\Factories\Locations;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Locations\State;
use App\Models\Locations\Country;
use App\Models\Locations\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    protected $model = Location::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city'        => fake()->city,
            'country_id'  => Country::factory(),
            'state_id'    => State::factory(),   
            'status'      => fake()->boolean() ? 1 : 0,
        ];
    }
}
