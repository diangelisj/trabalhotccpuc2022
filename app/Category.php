<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;


class Category extends Model
{
    //
    use HasSlug;

    protected $fillable =[ 'name','description','slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function products()
    {

        return $this->belongsToMany(Product::class);
       // return $this->belongsToMany(Product::class,'');
       // muitos para muitos

    }
}
