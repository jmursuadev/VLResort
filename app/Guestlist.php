<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guestlist extends Model
{
    protected $table = 'guestlist';

    protected $fillable = ['book_id','name','status']

    public function booking()
    {
        return $this->belongsTo('App\Booking','book_id');
    }
}
