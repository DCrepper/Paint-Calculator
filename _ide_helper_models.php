<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TilePaint> $paints
 * @property-read int|null $paints_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaintCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaintCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaintCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaintCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaintCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaintCategory whereUpdatedAt($value)
 */
	class PaintCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $paint_category_id
 * @property string $type
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TilePaintDescription|null $description
 * @property-read \App\Models\PaintCategory $paintCategory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint wherePaintCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaint whereUpdatedAt($value)
 */
	class TilePaint extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $tile_paint_id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TilePaint $tilePaint
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription whereTilePaintId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TilePaintDescription whereUpdatedAt($value)
 */
	class TilePaintDescription extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

