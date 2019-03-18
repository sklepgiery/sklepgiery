<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Zamowienie;
use App\Models\Status;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("user.logged.in");    
    }

    public function index()
    {
        return view('user.index');
    }
}
