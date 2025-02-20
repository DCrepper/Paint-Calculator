<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TilePaint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TilePaintDescription>
 */
class TilePaintDesciptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->text,
            'tile_paint_id' => TilePaint::factory(),
            'min' => $this->faker->numberBetween(2, 20),
            'max' => $this->faker->numberBetween(20, 30),
            'price' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
