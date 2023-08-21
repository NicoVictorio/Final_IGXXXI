<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public $timestamps = false;

    public function containerProducts()
    {
        return $this->hasMany(ContainerProduct::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}
