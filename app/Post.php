<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=['created_at', 'updated_at', 'deleted_at'];

    protected $date =['published_at'];
}
