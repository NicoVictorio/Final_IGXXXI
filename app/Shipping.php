<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function demand()
    {
        return $this->belongsTo(Demand::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
