<?php

namespace Planner\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Planner\User;

class UsersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the user credentials
        $this->validate($request, [
            'surName' => 'required|string|max:255',
            'otherNames' => 'required|string|max:255',
            'userName' => 'required|string|max:255',
            'emailAddress' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);

        // Save the new user
        $user = User::create(
            array_merge(
                $request->except('password'),

                array(
                    'password' => bcrypt($request->password)
                )
            )
        );

        // Assign the user the role.
        $role = Sentinel::findRoleById($request->role);

        $role->users()->attach($user);

        // Assign the user the departments.
        $user->depAssignment()->sync($request->departments);

        // Redirect back to the users list.
        return redirect('/administrative');
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
        // Fetch the user.
        $user = User::findOrFail($id);

        // Validate the user credentials
        $this->validate($request, [
            'surName' => 'required|string|max:255',
            'otherNames' => 'required|string|max:255',
            'userName' => 'required|string|max:255',
            'emailAddress' => [
                'required',
                'string',
                'email',
                'max:2555',
                Rule::unique('users')->ignore($user->id),
            ],
            'role' => 'required',
        ]);

        // Update the user.
        $user->update($request->all());

        // Assign the user the role.
        $user->roles()->sync(array($request->role));

        // Assign the user the departments.
        $user->depAssignment()->sync($request->departments);

        return redirect('/administrative');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/administrative');
    }
}
