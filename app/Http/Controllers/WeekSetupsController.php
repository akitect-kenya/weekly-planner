<?php

namespace Planner\Http\Controllers;

use Illuminate\Http\Request;
use Planner\WeekSetup;

class WeekSetupsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WeekSetup::create($request->all());

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wksetup = WeekSetup::findOrFail($id);

        $wksetup->delete();

        return redirect('/home');
    }
}
