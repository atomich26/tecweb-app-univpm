<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Malfunzionamenti;
use App\Http\Controllers\AdminController;
use App\Traits\CrudMalfunzionamenti;
use App\Traits\CrudSoluzioni;
use Illuminate\Support\Facades\Route;

class StaffController extends Controller
{   
    use CrudMalfunzionamenti, CrudSoluzioni;
    
    public function __construct(){
        $this->middleware('can:isStaff');
    }
}
