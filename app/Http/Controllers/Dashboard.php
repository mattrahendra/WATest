<?php

namespace App\Http\Controllers;

use App\Charts\WMReaderChart;
use App\Models\Baterai;
use App\Models\Data;
use App\Models\User;
use Carbon\Carbon;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
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

        // Nama file yang ingin dibaca dari storage
        $fileName = 'data/photo.jpg';

        $serviceAccountPath = base_path('/wmreader-8eff4-firebase-adminsdk-m20nm-a9ec95e4ca.json'); // Pastikan path ini benar

        // Inisialisasi Firebase
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDefaultStorageBucket('wmreader-8eff4.appspot.com');

        // Inisialisasi Storage Client
        $storage = $firebase->createStorage();

        // Nama bucket storage Firebase
        $bucket = $storage->getBucket();
        $object = $bucket->object($fileName);


        // Mendapatkan URL publik file
        $url = $object->signedUrl(new \DateTime('1 hour'));

        return view('dashboard.page', [
            'dataWMReaderMasuk' => $dataWMReaderMasuk,
            'totalPelanggan' => $totalPelanggan,
            'totalBateraiAktif' => $totalBateraiAktif,
            'pelangganBaru' => $pelangganBaru,
            'chart' => $chart,
            'fireimage' => $url,
        ]);
    }
}