<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->numberBetween(18, 75),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->freeEmail,
            'address' => $this->faker->address,
            'Biography' => $this->faker->paragraph($nbSentences = 2, $variableNbSentences = true, $asText = false),
            'image' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
