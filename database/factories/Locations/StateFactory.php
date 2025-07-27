<?php

namespace Database\Factories\Locations;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Locations\State;
use App\Models\Locations\Country;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    protected $model = State::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>fake()->name(),
            "country_id"=>Country::factory(),
            "status" => fake()->boolean() ? 1 : 0,

        ];
    }
}
