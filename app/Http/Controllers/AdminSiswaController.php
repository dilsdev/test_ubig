<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Siswa;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;

class AdminSiswaController extends Controller
{
    public function index(Request $request){
        if($request->filled('jk') && $request->filled('k')){
            $siswas = Siswa::select('siswas.nis', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->where(['siswas.jenis_kelamin'=>$request->jk,'kotas.nama'=>$request->k])
            ->orderBy('siswas.created_at', 'desc')
            ->get();
        }elseif($request->filled('jk')){
            $siswas = Siswa::select('siswas.nis', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->where(['siswas.jenis_kelamin'=>$request->jk])
            ->orderBy('siswas.created_at', 'desc')
            ->get();
        }elseif($request->filled('k')){
            $siswas = Siswa::select('siswas.nis', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->where(['kotas.nama'=>$request->k])
            ->orderBy('siswas.created_at', 'desc')
            ->get();
        }else{
            $siswas = Siswa::select('siswas.nis', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->orderBy('siswas.created_at', 'desc')
            ->get();
        }
        $kotas = Kota::all();
        return view('siswa', ['siswas'=>$siswas, 'kotas'=>$kotas]);
    }
    public function store(Request $request){
        $request->validate([
            'nis'=>'required|numeric',
            'nama'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'id_kota'=>'required'
        ]);
        Siswa::create($request->all());
        return redirect()->route('siswa');
    }
}
