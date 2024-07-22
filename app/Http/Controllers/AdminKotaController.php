<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class AdminKotaController extends Controller
{
    public function index(Request $request){
        if($request->filled('q')){
            $query = $request->input('q');
                $kotas = Kota::select('nama')
                ->orderBy('created_at', 'desc')
                ->where('nama', 'LIKE', '%' . $query . '%')
                ->paginate(5);
        }else{
            $kotas = Kota::orderBy('kotas.created_at','desc')->paginate(5);
        }
        return view('kota', ['kotas'=>$kotas]);
    }
    public function store(Request $request){
        $request->validate([
            'nama'=>'required',
        ]);
        Kota::create($request->all());
        return redirect()->route('kota');
    }
    public function delete($id){
        $data = Kota::find($id);
        $data->delete();
        return redirect()->route('kota');
    }
    
    public function edit(Request $request, $id){
        $request->validate([
            'nama'=>'required',
        ]);
        $data = Kota::find($id);
        $data->update($request->all());
        return redirect()->route('kota');
    }
}
