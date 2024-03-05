<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route(('home'));
        } else {
            return view('pages.auth.login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($data)) {
            Alert::success('Hore!', 'Login Berhasil!');
            return redirect()->route('home');
        } else {
            Alert::error('Error!', 'Username atau Password Salah!');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        Alert::success('Hore', 'Logout Berhasil!');
        return redirect()->route('login');
    }
}
