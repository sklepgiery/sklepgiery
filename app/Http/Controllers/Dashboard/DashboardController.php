<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("user.is.admin");
    }

    public function index() 
    {
        return view("dashboard.index");
    }
}