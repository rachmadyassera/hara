<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profil;
use App\Models\Location;
use App\Models\Confrence;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ConfrencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(Auth::user()->profil->opd_id);
        $rapat = Confrence::with(['user','opd','location'])->latest()->get()->where('status','enable')->where('opd_id', Auth::user()->profil->opd_id);

        return view('Operator.Rapat.index', compact('rapat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $lokasi = Location::latest()->get()->where('status','enable');
        return view('Operator.Rapat.add', compact('lokasi'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Confrence::create([
            'id' => Str::uuid(),
            'user_id' => Auth::user()->id,
            'opd_id' => Auth::user()->profil->opd_id,
            'location_id' => $request->location,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);
        Alert::success('Berhasil', 'Rapat berhasil didaftarkan');
        return redirect()->route('confrence.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $rapat = Confrence::find($id);
        $peserta = Participant::with('confrence')->latest()->get()->where('status','enable')->where('confrence_id', $id);

        return view('Operator.Rapat.peserta', compact('rapat','peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $lokasi = Location::get()->where('status','enable');
        $rapat = Confrence::find($id);

        if (Auth::user()->profil->opd_id !== $rapat->opd_id) {
            # code...
        Alert::warning('Oops', 'Anda tidak dapat melakukan aksi ini, masalah otorisasi');
        return redirect()->route('confrence.index');
        }

        return view('Operator.Rapat.edit', ['lokasi' => $lokasi,'rpt' => $rapat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rpt = Confrence::find($id);
        $rpt->user_id = Auth::user()->id;
        $rpt->location_id = $request->location;
        $rpt->judul = $request->judul;
        $rpt->keterangan = $request->keterangan;
        $rpt->tanggal = $request->tanggal;
        $rpt->save();

        Alert::success('Berhasil', 'Data Rapat berhasil diperbaharui');
        return redirect()->route('confrence.index');
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
        $rpt = Confrence::find($id);
        $rpt->status = 'disable';
        $rpt->save();

        Alert::success('Berhasil', 'Rapat berhasil dihapus');
        return back();

    }

    public function disable_participant($id)
    {
        $rpt = Participant::find($id);
        $rpt->status = 'disable';
        $rpt->save();

        Alert::success('Berhasil', 'Peserta berhasil dihapus');
        return back();

    }
}
