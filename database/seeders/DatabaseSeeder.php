<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PaintCategory;
use App\Models\Region;
use App\Models\Store;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TilePaint;
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

        $paintCategories = PaintCategory::factory()->count(3)->sequence(
            [
                'name' => 'Csempefestés',
            ],
            [
                'name' => 'Csempe megszüntetése bontás nélkül',
            ],
            [
                'name' => 'Faldíszítés',
            ],
        )
            ->has(TilePaint::factory()->count(3)->sequence(
                [
                    'name' => 'HARZO Color Easy Pack',
                    'type' => 'a',
                ],
                [
                    'name' => 'HARZO Color Easy plus',
                    'type' => 'b',
                ],
                [
                    'name' => 'HARZO Color Professional',
                    'type' => 'c',
                ],
            ), 'paints'
            )->createQuietly();

        $paintCategories->each(function (PaintCategory $paintCategory) {
            $paintCategory->paints->each(function (TilePaint $paint) {
                $paint->descriptions()->createMany([
                    [
                        'description' => '3-7 m2 csempe festésére az alább felsorolt anyagokat szükséges megvásárolni:          
HARZO Color Csempe és bútorfesték 1 liter x 2 db (igény szerint színezhető)
HARZO Lakk 1Komp. 1 liter x 1 db (egy rétegben)',
                        'min' => 1,
                        'max' => 10,
                        'price' => 1000,
                    ],
                    [
                        'description' => 'HARZO Color Csempe és bútorfesték 1 liter x 3 db (igény szerint színezhető)
HARZO Lakk 1Komp. 1 liter x 1 db (egy rétegben)',
                        'min' => 11,
                        'max' => 20,
                        'price' => 2000,
                    ],
                    [
                        'description' => 'HARZO Color Csempe és bútorfesték 1 liter x 4 db (igény szerint színezhető)
HARZO Lakk 1Komp. 1 liter x 1 db (egy rétegben)
HARZO Lakk 1Komp. 250 ml x 1 db (egy rétegben)',
                        'min' => 21,
                        'max' => 30,
                        'price' => 3000,
                    ],
                ]);
            });
        });

        Region::factory()->count(2)->sequence(
            ['name' => 'Budapest'],
            ['name' => 'Debrecen'],
        )->has(
            Store::factory()->count(2)
        )->create();

    }
}
