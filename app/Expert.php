<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $fillable = [
        'name','expert','country','TimeZone','start_time','end_time'
    ];
}
