<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TilePaintDescription extends Model
{
    /** @use HasFactory<\Database\Factories\TilePaintDescriptionFactory> */
    use HasFactory;

    protected $fillable = ['id', 'description', 'tile_paint_id', 'min', 'max', 'price'];

    public function tilePaint(): BelongsTo
    {
        return $this->belongsTo(TilePaint::class);
    }
}
