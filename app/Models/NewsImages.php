<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImages extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'news_images';
    protected $guarded = [];
}
