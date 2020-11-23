<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['start_date','end_date','duration','user_id','expert_id'];
}
