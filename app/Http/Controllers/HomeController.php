<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Penelitian;
use App\Models\Publikasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahFakultas = Fakultas::count();
        $jumlahDepartemen = Departemen::count();
        $jumlahDosen = Dosen::count();
        $tahunAjaran = '2024/2025'; // Ubah sesuai dengan data aktual

        $departemenLabels = Departemen::pluck('nama')->toArray();
        $publikasiData = Publikasi::selectRaw('count(*) as count')
            ->groupBy('departemen_id')
            ->pluck('count')
            ->toArray();
        $penelitianData = Penelitian::selectRaw('count(*) as count')
            ->groupBy('departemen_id')
            ->pluck('count')
            ->toArray();
        $jumlahDosenData = Dosen::selectRaw('count(*) as count')
            ->groupBy('departemen_id')
            ->pluck('count')
            ->toArray();

        return view('home', compact(
            'jumlahFakultas',
            'jumlahDepartemen',
            'jumlahDosen',
            'tahunAjaran',
            'departemenLabels',
            'publikasiData',
            'penelitianData',
            'jumlahDosenData'
        ));
        
    }
}
