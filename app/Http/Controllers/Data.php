<?php

namespace App\Http\Controllers;

use App\Models\Data as ModelData;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class Data extends Controller
{
    public function index() {
        $data = ModelData::all();
        $pelanggan = Pelanggan::all();
        return view ('data.page', ['data' => $data, 'pelanggan' => $pelanggan]);
    }
}