<?php

namespace Planner\Http\Controllers;

use Illuminate\Http\Request;
use Planner\Department;

class DepartmentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Auth::user()->departments()->create($request->all());

        return redirect('/academic');
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
        $department = \Auth::user()->departments()->findOrFail($id);

        $department->update($request->all());

        return redirect('/academic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = \Auth::user()->departments()->findOrFail($id);

        $department->delete();

        return redirect('/academic');
    }
}
