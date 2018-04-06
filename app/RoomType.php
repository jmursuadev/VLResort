<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'roomtype';

    protected $fillable = ['roomtype_name','description'];

    public function rooms()
    {
        return $this->hasMany('App\Room','roomtype_id');
    }
}
