<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainerProduct extends Model
{
    public $table = 'container_product';
    public $timestamps = false;

    public function demand()
    {
        return $this->belongsTo(Demand::class, 'Demand_id');
    }

    public function shippingContainer()
    {
        return $this->belongsTo(ShippingContainer::class, 'shipping_id');
    }
}
