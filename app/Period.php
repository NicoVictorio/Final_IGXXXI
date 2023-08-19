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
}
