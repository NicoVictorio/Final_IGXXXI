<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public $timestamps = false;

    public function scorings()
    {
        return $this->hasMany(Scoring::class);
    }

    public function shippingContainer()
    {
        return $this->hasOne(ShippingContainer::class, 'period_id');
    }

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }
}
