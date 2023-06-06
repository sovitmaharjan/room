<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'room_type_id' => rand(1, 8),
            'price' => rand(500, 50000),
            'description' => fake()->paragraph(),
            'availability' => rand(0, 1),
        ];
    }
}
