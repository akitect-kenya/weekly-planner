<?php

namespace Planner\Http\Controllers;

use Cartalyst\Sentinel\Roles\EloquentRole;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\Request;
use Planner\Department;
use Planner\Organisation;
use Planner\User;

class AdministrativeTabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Departments.
        $departments = Department::all();

        // Organisations.
        $organisations = Organisation::all();

        // Roles.
        $roles = EloquentRole::all();

        // Users.
        $users = User::with(array('depAssignment', 'roles'))->get();

        return view('administrative.index', compact('departments', 'organisations', 'roles','users'));
    }
}
