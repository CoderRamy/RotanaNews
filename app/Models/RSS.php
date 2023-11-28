<?php

namespace App\Models;

use App\traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class RSS extends Model
{
    use HasFactory, HasTranslations,ClearsResponseCache;


    public $translatable = ['title', 'description'];

    protected $connection = 'mysql';
    protected $table = 'rss';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            foreach ($model->images as $image) {
                if (Storage::disk('s3')->exists('news/' . substr($image->imageUrl, strrpos($image->imageUrl, '/') + 1)))
                    Storage::disk('s3')->delete('news/' . substr($image->imageUrl, strrpos($image->imageUrl, '/') + 1));
                $image->delete();
            }
        });
    }

    public function scopeFilter($q)
    {
        $title = generate_pattern(request()->title);
        if ($title)
            $q->where("title", 'REGEXP', $title);
        if (isset(request()->status))
            $q->where("status", (string)request()->status);
        if (request()->created_at)
            $q->where("created_at", request()->created_at);
        if (request()->category)
            $q->where("category", request()->category);
        return $q;
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(NewsMultipleImages::class, 'news_id');
    }
}
