<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $guarded = [];

    protected $table = 'check_out';

    public function users()
    {
        return $this->belongsTo('App\Users');
    }

}
