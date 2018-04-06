<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CottageType extends Model
{
    protected $table = 'cottagetype';

    protected $fillable = ['cottagetype_name','description'];

    public function cottages()
    {
        return $this->hasMany('App\Cottage','cottagetype_id');
    }
}
