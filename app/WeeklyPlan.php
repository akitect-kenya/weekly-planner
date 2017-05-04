<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class WeeklyPlan extends Model
{
    protected $fillable = [
        'weekly_setup_id',
        'grade_id'
    ];

    public function weeklyPlanSubject()
    {
        return $this->hasMany(WeeklyPlanSubject::class);
    }

    public function setup()
    {
        return $this->belongsTo(WeekSetup::class, 'weekly_setup_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
