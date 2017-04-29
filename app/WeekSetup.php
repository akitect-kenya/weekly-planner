<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class WeekSetup extends Model
{

    protected $fillable = [
        'weeklySetupName',
        'noDaysWeek',
        'noPeriodsDay',
        'startDay',
        'workPlanDesc',
        'org_id',
    ];

    public function organisation()
    {
        // return $this->belongsTo(Organisation::class);
    }
}
