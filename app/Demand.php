<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public $timestamps = false;

    public function shippings()
    {
        return $this->hasMany(Shipping::class);
    }
}
