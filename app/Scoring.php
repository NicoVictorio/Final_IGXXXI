<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scoring extends Model
{
    public $timestamps = false;

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
