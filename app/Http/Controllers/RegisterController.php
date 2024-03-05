<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|min:6|unique:users,username',
            'profile' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:1024',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $data['profile'] = $request->file('profile')->store('profile_picture', 'public');

        User::create($data);

        Alert::success('Hore!', 'Register Berhasil!');
        return redirect()->route('login');
    }
}
