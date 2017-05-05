<?php

namespace Planner\Http\Controllers;

use Illuminate\Http\Request;
use Planner\WeeklyPlan;
use Planner\WeeklyPlanSubject;

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
        // Fetch the weekly plan.
        $data = json_decode($request->weekly_plan);
        $weekly_plan = WeeklyPlan::findOrFail($data->id);

        $weekly_plan->update(
            array(
                'grade_id' => $data->grade_id,
                'weekly_setup_id' => $data->weekly_setup_id
            )
        );

        // Loop through the weekly plan subjects.
        foreach ($data->weekly_plan_subject as $item)
        {
            if (isset($item->id) && $item->id != null)
            {
                // Update the weekly plan subject.
                $weekly_plan->weeklyPlanSubject()->findOrFail($item->id)->update(
                    array(
                        'numberOfPeriods' => $item->numberOfPeriods,
                        'homeWork' => $item->homeWork,
                        'classWork' => $item->classWork,
                        'subject_id' => $item->subject_id,
                        'user_id' => \Auth::user()->id,
                        'week_day_id' => $item->week_day_id
                    )
                );
            }
            else
            {
                // Create the new weekly plan subject.
                $weekly_plan->weeklyPlanSubject()->create(
                    array(
                        'numberOfPeriods' => $item->numberOfPeriods,
                        'homeWork' => $item->homeWork,
                        'classWork' => $item->classWork,
                        'subject_id' => $item->subject_id,
                        'user_id' => \Auth::user()->id,
                        'week_day_id' => $item->week_day_id
                    )
                );
            }
        }

        return redirect('/plans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WeeklyPlan::findOrFail($id)->delete();

        return redirect('/plans');
    }
}
