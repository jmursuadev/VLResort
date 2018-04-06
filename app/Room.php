<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = ['room_number','roomtype_id','description','GuestMax','price','status'];

    public function booking()
    {
        return $this->hasMany('App\Booking','room_id');
    }

    public function roomtype()
    {
        return $this->belongsTo('App\RoomType','roomtype_id');
    }
}
