<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct(){
        
    }

    public function viewCatalogoPage(){
        return view('public.catalogo');
    }

    public function viewCentriAssistenzaPage(){
        return view('public.centri-assistenza');
    }

    public function viewFaqPage(){
        return view('public.faq');
    }
}
