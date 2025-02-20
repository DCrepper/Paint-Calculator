<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\PaintCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([PaintCategoryObserver::class])]
class PaintCategory extends Model
{
    /** @use HasFactory<\Database\Factories\PaintCategoryFactory> */
    use HasFactory;

    protected $fillable = ['id', 'name'];

    public function paints(): HasMany
    {
        return $this->hasMany(TilePaint::class);
    }
}
