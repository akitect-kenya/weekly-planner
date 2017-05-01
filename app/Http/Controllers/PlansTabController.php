<?php

namespace Planner\Http\Controllers;

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
        $wbSetups = WeekSetup::paginate(5);

        return view('plans.index', compact('wbSetups'));
    }
}
