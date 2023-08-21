<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingContainer extends Model
{
    public $table = 'shipping_container';
    public $timestamps = false;

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    public function containerProducts()
    {
        return $this->hasMany(ContainerProduct::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id', 'id');
    }
}
