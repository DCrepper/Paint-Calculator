<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\PaintCategory;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class PaintCategoryObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the PaintCategory "created" event.
     */
    public function created(PaintCategory $paintCategory): void
    {
        // create releated TilePaint a,b,c
        $paintCategory->paints()->createMany([
            ['type' => 'a', 'name' => ''],
            ['type' => 'b', 'name' => ''],
            ['type' => 'c', 'name' => ''],
        ]);
    }
}
