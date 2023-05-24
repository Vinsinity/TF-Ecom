<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BlogPost extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'content',' slug'];

    protected $fillable = ['author'];

    public function getSlugAttribute()
    {
        return $this->translation->slug;
    }
}
