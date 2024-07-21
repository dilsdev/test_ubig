<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKotaController extends Controller
{
    public function index(){
        return view('kota');
    }
}
