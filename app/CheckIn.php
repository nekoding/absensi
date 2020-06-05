<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $guarded = [];

    protected $table = 'check_in';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function check_out()
    {
        return $this->hasOne('App\CheckOut');
    }

}
