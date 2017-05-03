<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class WeeklyPlan extends Model
{
    protected $fillable = [
        'weekly_setup_id',
        'grade_id'
    ];

    public function setup()
    {
        return $this->belongsTo(WeekSetup::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
