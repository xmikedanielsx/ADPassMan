<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'user',
        'password',
        'notes',
    ];

    protected $dates = [
      'deleted_at',
      'created_at',
    ];
}
