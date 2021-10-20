<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Malfunzionamenti;
use App\Http\Controllers\AdminController;
use App\Traits\CrudMalfunzionamenti;
use App\Traits\CrudSoluzioni;
use Illuminate\Support\Facades\Route;
use App\Tables\ProdottiStaffTable;

class StaffController extends Controller
{   
    use CrudMalfunzionamenti, CrudSoluzioni;
    
    public function __construct(){
        $this->middleware('can:isStaff');
    }

    public function viewProdottiTable(Request $request){
        $table = new ProdottiStaffTable($request);

        return view('admin.staff-prodotti-table')->with('table', $table);
    }
}
