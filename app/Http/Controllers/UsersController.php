<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.index');
    }

    public function permission()
    {
        return view('users.permission');
    }

    public function roles()
    {
        return view('users.roles');
    }
}
