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
                    'description' => 'Ebben az esetben alapozás nélkül festi le a csempét olyan helyeken, ahol nem cél a vízállóság (pl. wc oldalfalak). Ebben az esetben a HARZO Csempe és Bútorfestékkel festhet úgy, hogy nem kell alapozót és felület védő lakkokat alkalmazni.',
                    'type' => 'a',
                ],
                [
                    'name' => 'HARZO Color Easy plus',
                    'description' => 'Csempefestés és lakkozás 1 vagy kétkomponensű lakkal olyan csempéken, ahol nem cél a tökéletes vízállóság, de fontos a felületvédelem. Idetartozik pl. a fürdőszobában minden olyan oldalfal felület, ami nem a tusoló és a kád körüli vízterhelt felületével érintkezik. Járófelületre nem ajánljuk. Ebben az esetben a HARZO Csempe és Bútorfestékkel festhet úgy, hogy nem kell alapozót alkalmazni, viszont a felületvédő lakkozás egy vagy kétkomponensű lakkal szükséges. Ez a megoldás tartós, de a tusolókban és kádaknál nagyban függ a tartóssága az igénybevételtől.',
                    'type' => 'b',
                ],
                [
                    'name' => 'HARZO Color Professional',
                    'description' => 'Csempefestés teljes biztonsággal olyan csempe felületeken, ahol fontos a vízállóság, a kopás elleni védelem (járófelület) és a hosszan tartósság. Ebben az esetben a HARZO T-16 kétkomponensű alapozót, a HARZO Csempe és Bútorfestéket, a HARZO kétkomponensű Lakkot és a HARZO Fényesítő-Ápolót kell alkalmazni. A c. verzió a csempe járófelületen is biztonsággal alkalmazható.',
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
