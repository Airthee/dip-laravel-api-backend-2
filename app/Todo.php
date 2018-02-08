<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $casts = [
        'isDone' => 'boolean',
        'created_at'=>'string',
        'updated_at'=>'string'
    ];
}