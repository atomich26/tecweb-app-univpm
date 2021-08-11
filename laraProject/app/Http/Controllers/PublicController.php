<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct(){
        
    }

    public function viewCatalogoPage(){
        return view('pages.catalogo');
    }

    public function viewHomePage(){
        return view('pages.home');
    }

    public function viewCentriAssistenzaPage(){
        return view('pages.centriAssistenza');
    }

    public function viewFaqPage(){
        return view('pages.faq');
    }
}
