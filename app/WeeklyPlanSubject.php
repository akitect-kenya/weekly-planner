<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class WeeklyPlanSubject extends Model
{
    protected $fillable = [
        'numberOfPeriods',
        'homeWork',
        'classWork',
        'active',
        'weekly_plan_id',
        'subject_id',
        'user_id',
        'week_day_id'
    ];

    public function weeklyPlan()
    {
        return $this->belongsTo(WeeklyPlan::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class);
    }

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class);
    }
}
