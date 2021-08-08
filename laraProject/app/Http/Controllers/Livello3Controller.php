<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Livello3Controller extends Controller
{
    public function __construct(){
        $this->middleware('can:isStaff');
    }
}
