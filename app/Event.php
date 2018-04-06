<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['event_name','description','GuestMax','price','status'];

    public function booking()
    {
        return $this->hasMany('App\Booking','event_id');
    }
}
