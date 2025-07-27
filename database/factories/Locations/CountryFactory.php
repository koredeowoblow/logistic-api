<?php

namespace Database\Factories\Locations;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Locations\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=> fake()->name(),
            'status' => fake()->boolean() ? 1 : 0,
        ];
    }
}
