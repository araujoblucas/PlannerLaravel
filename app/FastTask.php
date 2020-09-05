<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastTask extends Model
{
    protected $guarded = [];

    protected $casts = [
        'completed' => 'boolean'
    ];
}
