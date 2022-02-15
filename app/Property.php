<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';
    protected $fillable = [
        'size', 'rent', 'age', 'floor'
    ];
    public $timestamps = false;
}
