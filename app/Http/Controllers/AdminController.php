<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $students = Siswa::select(DB::raw('YEAR(tanggal_lahir) as year'), DB::raw('count(*) as total'))
            ->groupBy('year')
            ->orderBy('year')
            ->get()
            ->toArray();
        $jeniskelamin = Siswa::selectRaw('jenis_kelamin as gender, COUNT(*) as total')
            ->groupBy('jenis_kelamin')
            ->orderBy('jenis_kelamin')
            ->get()
            ->toArray();

        $kotas = Siswa::select('kotas.nama as kota', DB::raw('count(*) as total'))
            ->join('kotas', 'kotas.id', '=', 'siswas.id_kota')
            ->groupBy('kotas.nama')
            ->orderBy('total', 'desc')
            ->get()
            ->toArray();
        // dd($kotas);
        return view('dashboard', ['students'=>$students, 'jeniskelamin'=>$jeniskelamin, 'kotas'=>$kotas]);
    }
}
