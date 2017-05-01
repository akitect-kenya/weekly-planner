<?php

namespace Planner\Http\Controllers;

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
        $users = User::with('depAssignment')->get();

        // Departments.
        $departments = Department::all();

        return view('administrative.index', compact('departments', 'users'));
    }
}
