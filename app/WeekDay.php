<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    protected $fillable = [
        'dayName',
        'active'
    ];
}
