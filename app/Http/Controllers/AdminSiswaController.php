<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    public function index(){
        return view('siswa');
    }
}
