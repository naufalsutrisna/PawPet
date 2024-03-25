<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenggunaController extends Controller
{
    public function showBiodata()
    {
        $pengguna = Pengguna::where('username', auth()->user()->username)->first(); 
        
        return view('biodata', ['pengguna' => $pengguna]);
    }
    public function updateBiodata(Request $request)
    {
        $pengguna = Pengguna::where('username', auth()->user()->username)->first();

        $pengguna->name = $request->input('name');
        $pengguna->age = $request->input('age');
        $pengguna->gender = $request->input('gender');
        $pengguna->job = $request->input('job');
        $pengguna->phoneNumber = $request->input('phoneNumber');
        
        $pengguna->save();

        return redirect()->route('profil');
    }

    public function showEditBiodata()
    {
        $pengguna = Pengguna::where('username', auth()->user()->username)->first();

        return view('editBiodata', ['pengguna' => $pengguna]);
    }

    public function cancelEdit()
    {
        return redirect()->route('profil');
    }
}
