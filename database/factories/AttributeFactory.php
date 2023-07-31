<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hair_color' => $this->faker->randomElement(['Blonde', 'Brunette', 'Black']),
            'ethnicity' => $this->faker->randomElement(['White', 'Latin', 'Black']),
            'tattoos' => $this->faker->boolean(),
            'piercings' => $this->faker->boolean(),
            'breast_size' => $this->faker->numberBetween(20, 50),
            'breast_type' => strtoupper($this->faker->randomLetter()),
            'gender' => $this->faker->randomElement(['female', 'male']),
            'orientation' => $this->faker->randomElement(['straight', 'gay']),
            'age' => $this->faker->numberBetween(18, 80)
        ];
    }

    public function specificAttribute()
    {
        return $this->state(function (array $attributes) {
            return [
                'hair_color' => 'Blode',
                'ethnicity' => 'White',
                'tattoos' => 1,
                'piercings' => 0,
                'breast_size' => null,
                'breast_type' => null,
                'gender' => 'female',
                'orientation' => null,
                'age' => null
            ];
        });
    }

}
