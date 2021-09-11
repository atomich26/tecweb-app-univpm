<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:hasProfilePage');
    }

    public function index(){
        return view('users.user-profile')->with('user', Auth::user());
    }
}
