<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => random_int(1,5),
            'assetName' => fake()->name(),
            'faNo' =>fake()->randomNumber(),
            'serialNo' => fake()->randomNumber(),
            'lendingDate' => fake()->date(),
            'isReturned' => random_int(0,1),
            'remarks' =>fake()->streetName(),
        ];
    }
}
