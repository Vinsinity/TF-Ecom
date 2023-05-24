<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSeoSetting extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','keywords','robots','sitemap','rss','google_verify','facebook_verify'];
}
