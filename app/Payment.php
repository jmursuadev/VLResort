<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = ['book_id','balance','payment','status'];

    public function booking()
    {
        return $this->belongsTo('App\Booking','book_id');
    }
}
