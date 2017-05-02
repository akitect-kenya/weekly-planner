<?php

namespace Planner\Http\Controllers;

use Cartalyst\Sentinel\Roles\EloquentRole;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\Request;
use Planner\Department;
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
        // Users.
        $users = User::with(array('depAssignment', 'roles'))->get();

        // Departments.
        $departments = Department::all();

        // Roles.
        $roles = EloquentRole::all();

        return view('administrative.index', compact('departments', 'roles','users'));
    }
}
