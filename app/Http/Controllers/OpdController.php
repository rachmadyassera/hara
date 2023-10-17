<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opd = Opd::latest()->get();
        return view('Admin.Opd.index', compact('opd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Opd.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Opd::create([
            'id' => Str::uuid(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        Alert::success('Berhasil', 'Organisasi berhasil didaftarkan');
        return redirect()->route('opd.index');
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
        $opd = Opd::find($id);
        return view('Admin.Opd.edit', ['opd' => $opd]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $opd = Opd::find($id);
        $opd->nama = $request->nama;
        $opd->alamat = $request->alamat;
        $opd->longitude = $request->longitude;
        $opd->latitude = $request->latitude;
        $opd->save();

        Alert::success('Berhasil', 'Organisasi berhasil diperbaharui');
        return redirect()->route('opd.index');
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
        $opd = Opd::find($id);
        $opd->status = 'disable';
        $opd->save();

        Alert::success('Berhasil', 'Organisasi berhasil didaftarkan');
        return redirect()->route('opd.index');

    }
}
