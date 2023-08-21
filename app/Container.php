<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    public $timestamps = false;

    public function shippingContainers()
    {
        return $this->hasMany(Shipping::class);
    }
}
