<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{

    use HasSlug;
    //
    protected $fillable =[ 'name','description','body','price','slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function store(){

        return $this->belongsTo(Store::class);
    }

   public function categories()
  {

       return $this->belongsToMany(Category::class);
     // return $this->belongsToMany(Category::class,'segundo parametro');
        // muitos para muitos
    }

    public function  photos()
    {
        return $this->hasMany(productPhoto::class);
    }
}
