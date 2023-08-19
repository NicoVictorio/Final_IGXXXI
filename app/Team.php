<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;

    public function scorings()
    {
        return $this->hasMany(Scoring::class);
    }

    public function shippings()
    {
        return $this->hasMany(Shipping::class);
    }
    
    public function user()
    {
        return $this->hasOne(User::class, 'team_id');
    }
}