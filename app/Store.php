<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model
{

    use  HasSlug;
    //

    //protected $table ='nome_diferente_da_tabela';

    protected $fillable =[ 'name','description','phone','mobile_phone','slug','logo'];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function products(){

        return $this->hasMany(Product::class);
        // um para muitos
    }
}

//store
//stores

// 1:1  -  Um para um ( usuário e loja)  hasOne e belongsTo
// 1:n  - Um para muitos (loja e produtos) hasMany  e BelongsTo
// N:N  - Muitos para muitos ( produtos e categorias)  belongsToMany


