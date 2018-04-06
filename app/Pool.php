<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $table = 'pools';

    protected $fillable = ['pool_name','description','feet','capacity','url','status'];
}
