<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan as ModelsPelanggan;
use App\Models\User;
use Google\Cloud\Sql\V1\User as V1User;
use Illuminate\Http\Request;

class Pelanggan extends Controller
{
    public function index() {
        $pelanggan = User::all();
        return view('user.page', ['pelanggan' => $pelanggan]);
    }

    public function add() {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        User::create([
            'id' => $request->id,
            'nama' => $request->name,
            'alamat' => $request->address,
            'level' => 'pelanggan'
        ]);

        return redirect()->route('pelanggan')->with('success', 'Customer added successfully.');
    }

    public function edit($id) {
        $pelanggan = User::find($id);
        return view ('user.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $pelanggan = User::find($id);
        $pelanggan->update([
            'nama' => $request->name,
            'alamat' => $request->address,
        ]);

        return redirect()->route('pelanggan')->with('success', 'Customer updated successfully.');
    }

    public function delete($id) {
        $pelanggan = User::find($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan')->with('success', 'Customer deleted successfully.');
    }

}