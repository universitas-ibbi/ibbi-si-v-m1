<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "tblpost";


    public function author()
    {
        return $this->belongsTo(User::class, "author_id");
    }
}
