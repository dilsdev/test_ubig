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
            $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->where(['siswas.jenis_kelamin'=>$request->jk,'kotas.nama'=>$request->k])
            ->orderBy('siswas.created_at', 'desc')
            ->paginate(10);
        }elseif($request->filled('jk')){
            $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->where(['siswas.jenis_kelamin'=>$request->jk])
            ->orderBy('siswas.created_at', 'desc')
            ->paginate(10);
        }elseif($request->filled('k')){
            $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->where(['kotas.nama'=>$request->k])
            ->orderBy('siswas.created_at', 'desc')
            ->paginate(10);
        }elseif($request->filled('q') && $request->filled('type')){
            if($request->type == 'all'){
                $query = $request->input('q');

            $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
                ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
                ->when($query, function ($queryBuilder, $query) {
                    return $queryBuilder->where(function($subQuery) use ($query) {
                        $subQuery->where('siswas.nama', 'LIKE', '%' . $query . '%')
                                ->orWhere('siswas.nis', 'siswas.id', 'LIKE', '%' . $query . '%')
                                ->orWhere('siswas.tanggal_lahir', 'LIKE', '%' . $query . '%')
                                ->orWhere('siswas.alamat', 'LIKE', '%' . $query . '%')
                                ->orWhere('kotas.nama', 'LIKE', '%' . $query . '%');
                    });
                })
                ->orderBy('siswas.created_at', 'desc')
                ->paginate(10);
            }elseif($request->type == 'nama'){
                $query = $request->input('q');

            $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
                ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
                ->when($query, function ($queryBuilder, $query) {
                    return $queryBuilder->where(function($subQuery) use ($query) {
                        $subQuery->where('siswas.nama', 'LIKE', '%' . $query . '%');
                    });
                })
                ->orderBy('siswas.created_at', 'desc')
                ->paginate(10);
            }elseif($request->type == 'nis'){
                $query = $request->input('q');

                $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
                    ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
                    ->when($query, function ($queryBuilder, $query) {
                        return $queryBuilder->where(function($subQuery) use ($query) {
                            $subQuery->where('siswas.nis', 'siswas.id', 'LIKE', '%' . $query . '%');
                        });
                    })
                    ->orderBy('siswas.created_at', 'desc')
                    ->paginate(10);
            }else{
                $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->orderBy('siswas.created_at', 'desc')
            ->paginate(10);
            }
            
        }else{
            $siswas = Siswa::select('siswas.nis', 'siswas.id', 'siswas.nama as namasiswa', 'siswas.tanggal_lahir', 'siswas.jenis_kelamin', 'siswas.alamat', 'kotas.nama as kota')
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->orderBy('siswas.created_at', 'desc')
            ->paginate(10);
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
    public function delete($id){
        $data = Siswa::find($id);
        $data->delete();
        return redirect()->route('siswa');
    }
    public function edit(Request $request, $id){
        $request->validate([
            'nis'=>'required|numeric',
            'nama'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'id_kota'=>'required'
        ]);
        $data = Siswa::find($id);
        $data->update($request->all());
        return redirect()->route('siswa');
    }
}
