<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{

    use HasTranslations;
    public $translatable = ['name','description'];

    protected $guarded = [];

    protected $connection = 'mysql';

    protected $table = 'categories';

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id');
    }

    public function rss()
    {
        return $this->hasMany(Rss::class);
    }

}
