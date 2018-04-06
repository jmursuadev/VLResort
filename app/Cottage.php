<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cottage extends Model
{
    protected $table = 'cottages';

    protected  $fillable = ['cottage_number','cottagetype_id','description','GuestMax','price','status'];

    public function cottagetype()
    {
        return $this->belongsTo('App\CottageType','cottagetype_id');
    }
}
