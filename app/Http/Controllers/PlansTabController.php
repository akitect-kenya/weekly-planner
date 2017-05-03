<?php

namespace Planner\Http\Controllers;

use Planner\Grade;
use Planner\Subject;
use Planner\WeekDay;
use Planner\WeeklyPlan;
use Planner\WeekSetup;

class PlansTabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Days.
        $days = WeekDay::all();

        // Subjects.
        $subjects = Subject::all();

        // Setups.
        $wbSetups = WeekSetup::all();

        // Plan.
        $plans = WeeklyPlan::all();

        // Grades.
        $grades = Grade::all();

        return view('plans.index', compact('days', 'grades', 'subjects', 'plans', 'wbSetups'));
    }
}
