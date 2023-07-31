<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subscriptions' => $this->faker->randomNumber(5),
            'monthly_searches' => $this->faker->randomNumber(8),
            'views' => $this->faker->randomNumber(6),
            'videos_count' => $this->faker->numberBetween(10, 200),
            'premium_videos_count' => $this->faker->numberBetween(10, 200),
            'white_label_video_count' => $this->faker->numberBetween(10, 200),
            'rank' => $this->faker->randomNumber(4),
            'rank_premium' => $this->faker->randomNumber(4),
            'rank_wl' => $this->faker->randomNumber(5),
        ];
    }

    public function specificStatistic()
    {
        return $this->state(function (array $attributes) {
            return [
                'subscriptions' => 10000,
                'monthly_searches' => 10000,
                'views' => 10000,
                'videos_count' => 100,
                'premium_videos_count' => 100,
                'white_label_video_count' => 100,
                'rank' => 1000,
                'rank_premium' => 1000,
                'rank_wl' => 1000
            ];
        });
    }

}
