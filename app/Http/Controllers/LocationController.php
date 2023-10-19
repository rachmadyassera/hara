<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lokasi = Location::latest()->get()->where('status','enable');
        return view('Operator.Lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Operator.Lokasi.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Location::create([
            'id' => Str::uuid(),
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);
        Alert::success('Berhasil', 'Lokasi berhasil didaftarkan');
        return redirect()->route('location.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $lokasi = Location::find($id);
        return view('Operator.Lokasi.edit', ['lks' => $lokasi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $lks = Location::find($id);
        $lks->nama = $request->nama;
        $lks->alamat = $request->alamat;
        $lks->save();

        Alert::success('Berhasil', 'Lokasi berhasil diperbaharui');
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // ======================== other function =======================


    public function disable($id)
    {
        $opd = Location::find($id);
        $opd->status = 'disable';
        $opd->save();

        Alert::success('Berhasil', 'Lokasi berhasil dihapus');
        return back();

    }
}
