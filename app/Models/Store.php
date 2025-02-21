<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'email', 'region_id'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
