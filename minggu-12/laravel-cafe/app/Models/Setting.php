<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'tblsetting';

    protected $fillable = [
        'title',
        'subtitle',
        'about'
    ];
}
