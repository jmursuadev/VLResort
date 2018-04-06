<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = ['user_id','room_id','cottage_id','pax','price','remarks','status'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room','room_id');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment','book_id');
    }

    public function cottage()
    {
        return $this->belongsTo('App\Cottage','cottage_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }

    public function guests()
    {
        return $this->hasMany('App\Guestlist','book_id');
    }
}
