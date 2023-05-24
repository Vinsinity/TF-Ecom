<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Theme extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name','slug','status'];

    protected $casts = ['settings' => 'array'];

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

    public function getSettingsAttribute($value)
    {
        return json_decode($value,true);
    }

    public function type()
    {
        return $this->belongsTo(ThemeType::class);
    }

    public function setting()
    {
        return $this->hasOne(ThemeSetting::class);
    }
}
