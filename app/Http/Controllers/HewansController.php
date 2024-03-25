<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class HewansController extends Controller
{
    public function showAll(Request $request) {
        $searchValue = $request->input('search');

        if ($searchValue) {
            $hewans = Hewan::where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('type', 'like', '%' . $searchValue . '%')
                ->orWhere('race', 'like', '%' . $searchValue . '%')
                ->orWhere('gender', 'like', '%' . $searchValue . '%')
                ->get();
        } else {
            $hewans = Hewan::all();
        }

        return view('Pet')
            ->with('hewans', $hewans)
            ->with('title', 'Pet');
    }

    public function show($id)
    {
        $hewan = Hewan::find($id);
        $pengguna = $hewan->pengguna;

        return view('DetailProfilHewan', [
            'hewan' => $hewan,
            'pengguna' => $pengguna,
        ]);
    }

    public function showPet()
    {
        $hewans = Hewan::all();
        return view('adoption')->with('hewans', $hewans);
    }

    public function showDetail($id)
    {
        $hewans = Hewan::find($id);
        return view('profilHewan')->with('hewan', $hewans);
    }

    public function changeStatus($id, $changeStatus)
    {
        $hewan = Hewan::where('id', $id)->first();
        $status = '';

        if ($changeStatus == "Tersedia untuk Adopsi") {
            $status = "Sudah Diadopsi";
        } else {
            $status = "Tersedia untuk Adopsi";
        }

        $hewan->update([
            'adoptStatus' => $status,
        ]);

        return view('profilHewan')->with('hewan', $hewan);
    }

    public function showEdit(Request $request)
    {
        $action = $request->input('action');
        $hewanId = $request->input('id');

        if ($action === 'hapus') {
            $hewan = Hewan::where('id', $hewanId)->first();
            $hewan->delete();

            $hewans = Hewan::all();
            return view('adoption')->with('hewans', $hewans);
        } elseif ($action === 'edit') {
            $hewan = Hewan::where('id', $hewanId)->first();
            return view('editProfilHewan')->with('hewan', $hewan);
        }
    }

    public function showChange(Request $request)
    {
        $action = $request->input('action');
        $id = $request->input('id');

        if ($action === 'kembali') {
            $hewan = Hewan::where('id', $id)->first();
            return view('profilHewan')->with('hewan', $hewan);
        } elseif ($action === 'simpan') {
            $name = $request->input('name');
            $type = $request->input('type');
            $race = $request->input('race');
            $age = $request->input('age');
            $gender = $request->input('gender');
            $health = $request->input('health');
            $hewan = Hewan::find($id);

            $hewan->update([
                'name' => $name,
                'type' => $type,
                'race' => $race,
                'age' => $age,
                'gender' => $gender,
                'health' => $health,
            ]);
            return view('profilHewan')->with('hewan', $hewan);
        }
    }

    public function index()
    {
        return view('addPet');
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'petName' => 'required|string',
            'petTipe' => 'required|string',
            'petRas' => 'required|string',
            'petUmur' => 'required|numeric|min:1',
            'petGender' => 'required|string',
            'petRiwayat' => 'required|string',
            'petPhoto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('petPhoto')) {
            $photoPath = $request->file('petPhoto')->store('photos', 'public');
        } else {
            $photoPath = null;
        }


        $pet = Hewan::create([
            'name' => $validatedData['petName'],
            'type' => $validatedData['petTipe'],
            'race' => $validatedData['petRas'],
            'age' => $validatedData['petUmur'],
            'gender' => $validatedData['petGender'],
            'health' => $validatedData['petRiwayat'],
            'adoptStatus' => 'Tersedia untuk Adopsi',
            'photo' => 'photo',
            'username' => auth()->user()->username,
        ]);

        return redirect('/adoption');
    }
}
