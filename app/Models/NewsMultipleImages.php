<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsMultipleImages extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'news_multiple_images';
    protected $guarded = [];
}
