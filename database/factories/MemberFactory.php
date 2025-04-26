<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'F_Name'=>fake()->name(),
            'Birth_Date'=>fake()->date(),
            'Address'=>fake()->address(),
            'Phone_Number'=>fake()->randomDigit(10),	
            'Image'=>fake()->imageUrl(20, 20, 'animals'),	
            'Email'=>fake()->unique()->safeEmail()
            ];
    }
}
