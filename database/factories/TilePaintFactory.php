<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PaintCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TilePaint>
 */
class TilePaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['a', 'b', 'c']),
            'name' => $this->faker->word,
            'paint_category_id' => PaintCategory::factory(),
            'description' => $this->faker->sentence,
        ];
    }
}
