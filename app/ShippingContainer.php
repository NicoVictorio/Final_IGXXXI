<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingContainer extends Model
{
    public $table = 'shipping_container';
    public $timestamps = false;

    public function container()
    {
        return $this->belongsTo(Container::class, 'Container_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'Team_id');
    }
    
    public function containerProducts()
    {
        return $this->hasMany(ContainerProduct::class, 'Shipping_id');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'Period_id', 'id');
    }
}
