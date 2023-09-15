<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'phone_1'            => '01' . fake()->randomNumber(9),
            'phone_2'            => '01' . fake()->randomNumber(9),
            'nid'                => fake()->randomNumber(5),
            'driving_license_no' => fake()->randomNumber(6),
            'address'            => fake()->paragraph(1),
        ];
    }
}
