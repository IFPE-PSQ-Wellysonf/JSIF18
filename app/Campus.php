<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campi';

    protected $fillable = [
        'campus',
    ];
}
