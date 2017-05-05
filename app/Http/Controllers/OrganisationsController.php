<?php

namespace Planner\Http\Controllers;

use Planner\Organisation;
use Illuminate\Http\Request;

class OrganisationsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Organisation::create($request->all());

        return redirect('/administrative');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Organisation $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        $organisation->update($request->all());

        return redirect('/administrative');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Planner\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        $organisation->delete();

        return redirect('/administrative');
    }
}
