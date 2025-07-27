<?php

namespace Database\Factories\Transportations;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transportations\TransportationModeCategory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransportModeCategory>
 */
class TransportationModeCategoryFactory extends Factory
{
    protected $model = TransportationModeCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = $this->faker->unique()->word();

        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'description' => $this->faker->sentence(),
            'status' => fake()->boolean() ? 1 : 0,
        ];

    }
}
