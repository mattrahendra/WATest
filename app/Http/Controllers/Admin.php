<?php

namespace App\Http\Controllers;

use App\Models\Admin as ModelsAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function index() {
        $admin = User::all();
        return view('admin.page', ['admin' => $admin]);
    }

    public function showlogin() {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'level' => 'admin'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }


    public function add()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin'
        ]);

        return redirect()->route('admin')->with('success', 'Admin added successfully.');
    }

    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $admin = User::find($id);

        $admin->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
        ]);

        return redirect()->route('admin')->with('success', 'Admin updated successfully.');
    }

    public function delete($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect()->route('admin')->with('success', 'Admin deleted successfully.');
    }
}