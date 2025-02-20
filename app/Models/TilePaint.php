<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TilePaint extends Model
{
    // type: a, b, c mandatory
    // name any string ex: 'HARZO Color Easy Pack'

    protected $fillable = ['type', 'name', 'paint_category_id', 'description'];

    public function paintCategory(): BelongsTo
    {
        return $this->belongsTo(PaintCategory::class);
    }

    public function description(): HasOne
    {
        return $this->hasOne(TilePaintDescription::class);
    }
}
