<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Permission extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name','slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_permissions');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_permissions');
    }

    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(Admin::class,'admin_permissions');
    }
}
