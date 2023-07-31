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
            'name' => $this->faker->name(),
            'license' => 'REGULAR',
            'wl_status' => $this->faker->boolean(),
            'link' => $this->faker->url('https')
        ];
    }

    public function specificPerson()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Aaliyah Jolie',
                'license' => 'REGULAR',
                'wl_status' => 1,
                'link' => 'https://www.pornhub.com/pornstar/aaliyah-jolie'
            ];
        });
    }
}
