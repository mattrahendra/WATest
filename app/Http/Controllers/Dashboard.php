<?php

namespace App\Http\Controllers;

use App\Charts\WMReaderChart;
use App\Models\Baterai;
use App\Models\Data;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(WMReaderChart $chart)
    {
        // Ambil data untuk metrics dari database atau API
        $dataWMReaderMasuk = Data::whereDate('created_at', Carbon::today())->count(); // Contoh data
        $totalPelanggan = User::where('level', 'pelanggan')->count();
        $totalBateraiAktif = Baterai::where('status', 'aktif')->count();
        $pelangganBaru = User::whereDate('created_at', Carbon::today())->count(); // Contoh data

        // Siapkan data untuk chart
        $chart = $chart->build();

        return view('dashboard.page', [
            'dataWMReaderMasuk' => $dataWMReaderMasuk,
            'totalPelanggan' => $totalPelanggan,
            'totalBateraiAktif' => $totalBateraiAktif,
            'pelangganBaru' => $pelangganBaru,
            'chart' => $chart,
        ]);
    }
}
