<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "tblcomment";

    protected $fillable = [
        "content",
        "post_id",
        "author_id"
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
