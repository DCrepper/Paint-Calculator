<?php

declare(strict_types=1);

use App\Models\TilePaint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tile_paint_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TilePaint::class)->constrained();
            $table->text('description');
            $table->integer('min'); // min range m2
            $table->integer('max'); // max range m2
            $table->integer('price'); // price fix in min-max range ex: 100-200 1000ft
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tile_paint_descriptions');
    }
};
