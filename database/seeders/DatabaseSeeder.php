<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PaintCategory;
use App\Models\TilePaint;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $paintCategories = PaintCategory::factory()->count(3)->create();
        $paintCategories->each(function ($paintCategory) {
            TilePaint::factory()->count(3)->sequence(
                [
                    'type' => 'a',
                ],
                [
                    'type' => 'b',
                ],
                [
                    'type' => 'c',
                ],
            )->create([
                'paint_category_id' => $paintCategory->id,
            ]);
        });

    }
}
