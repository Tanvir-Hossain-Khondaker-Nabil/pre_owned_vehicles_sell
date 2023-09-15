<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'               => fake()->name(),
            'email'              => fake()->unique()->safeEmail(),
            'avatar'             => 'https://i.pravatar.cc/300',
            'phone'              => '01' . fake()->randomNumber(9, true),
            'nid'                => fake()->randomNumber(9, true),
            'driving_license_no' => fake()->randomNumber(9, true),
            'address'            => fake()->paragraph(1),
        ];
    }
}
