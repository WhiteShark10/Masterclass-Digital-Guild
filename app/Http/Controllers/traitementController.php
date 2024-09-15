<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class traitementController extends Controller
{
    public function index(){
        return view("index");
    }

    public function ProductShow(){
        return view("ShowProduct");
    }
}
