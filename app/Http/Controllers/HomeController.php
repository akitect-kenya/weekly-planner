<?php

namespace Planner\Http\Controllers;

use Illuminate\Http\Request;
use Planner\WeekSetup;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wbSetups = WeekSetup::paginate(5);

        return view('home', compact('wbSetups'));
    }
}
