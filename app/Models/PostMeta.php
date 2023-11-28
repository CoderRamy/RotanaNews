<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{


    protected $connection = 'mysql';
    protected $table = 'post_meta';
    protected $guarded = [];
}
