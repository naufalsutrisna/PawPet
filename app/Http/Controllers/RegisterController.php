<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.signUp'); 
    }
    public function store(Request $request)
    {
        session()->flash('name', $request->name);
        session()->flash('age', $request->age);
        session()->flash('job', $request->job);
        session()->flash('gender', $request->gender);
        session()->flash('username', $request->username);
        session()->flash('email', $request->email);
        session()->flash('password', $request->password);
        session()->flash('phoneNumber', $request->phoneNumber);

        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|max:255',
            'gender' => 'required|max:255',
            'job' => 'required|max:255',
            'username' => ['required', 'min:5', 'max:255', 'unique:penggunas'],
            'email' => 'required|email|unique:penggunas',
            'password' => 'required|min:5|max:255',
            'phoneNumber' => 'required|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'job' => $request->job,
            'gender' => $request->gender,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber,
        ];
        Pengguna::create($data);

        return redirect('/auth/login');
    }
}
