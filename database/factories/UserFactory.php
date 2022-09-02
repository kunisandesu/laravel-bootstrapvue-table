<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->freeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            'group' => $this->faker->numberBetween($min = 1, $max = 2),
            'course' => $this->faker->numberBetween($min = 1, $max = 5),
    
            'time' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 6.89, $max = 10.23),
            'point' => $this->faker->numberBetween($min = 15000, $max = 30000),

            'year' => $this->faker->numberBetween($min = 6, $max = 48),
            'category' => $this->faker->text(5),
            'class' => $this->faker->text(5),
    
            'race_day' => $this->faker->dateTimeBetween($startDate = '-1 days', $endDate = 'now'),
            'round' => $this->faker->text(5),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
