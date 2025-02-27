<?php

declare(strict_types=1);

use App\Models\PaintCategory;
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
        Schema::create('tile_paints', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PaintCategory::class)->constrained();
            $table->string('type', 10)->nullable(false);
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->longText('paint_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tile_paints');
    }
};
