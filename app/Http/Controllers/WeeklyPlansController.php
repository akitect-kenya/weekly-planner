<?php

namespace Planner\Http\Controllers;

use Illuminate\Http\Request;
use Planner\WeeklyPlan;

class WeeklyPlansController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->weekly_plan);

        // Create the weekly plan.
        $weeklyPlan = WeeklyPlan::create(
            array(
                'grade_id' => $data->grade_id,
                'weekly_setup_id' => $data->weekly_setup_id
            )
        );

        // Create the sub plans.
        $subPlans = $data->subjectPlans;

        foreach ($subPlans as $subPlan) {
            $weeklyPlan->weeklyPlanSubject()->create(
                array(
                    'numberOfPeriods' => $subPlan->numberOfPeriods,
                    'homeWork' => $subPlan->homeWork,
                    'classWork' => $subPlan->classWork,
                    'subject_id' => $subPlan->subject_id,
                    'user_id' => \Auth::user()->id,
                    'week_day_id' => $subPlan->week_day_id
                )
            );
        }

        return redirect('/plans');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
