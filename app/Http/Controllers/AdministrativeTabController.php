<?php

namespace Planner\Http\Controllers;

use Illuminate\Http\Request;
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
        $users = User::all();

        return view('administrative.index', compact('users'));
    }
}
