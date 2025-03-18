<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerShop extends Model
{
    protected $fillable = [
        'region_id',
        'company_name',
        'name',
        'address',
        'phone',
        'email',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
