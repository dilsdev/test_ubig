<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class AdminKotaController extends Controller
{
    public function index(){
        $kotas = Kota::orderBy('kotas.created_at','desc')->get();
        return view('kota', ['kotas'=>$kotas]);
    }
    public function store(Request $request){
        $request->validate([
            'nama'=>'required',
        ]);
        Kota::create($request->all());
        return redirect()->route('kota');
    }
}
