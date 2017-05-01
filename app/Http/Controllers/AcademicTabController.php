<?php

namespace Planner\Http\Controllers;

use Planner\Department;
use Planner\Subject;

class AcademicTabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Subjects
        $subjects = Subject::all();

        // Departments
        $departments = Department::all();

        // Grades
        // TODO: Fetch all the grades.

        return view('academic.index', compact('subjects', 'departments'));
    }
}
