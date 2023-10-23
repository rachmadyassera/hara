<?php

namespace App\Http\Controllers;

use App\Models\Confrence;
use App\Models\Participant;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ParticipantController extends Controller
{
    //
    public function presence($id)
    {
        //
        $rapat = Confrence::find($id);
        return view('front-end.peserta.formulir-kehadiran', compact('rapat'));
    }

    public function store(Request $request)
    {
        //
        $rapat = Confrence::find($request->confrence);
        if ($rapat->status == 'disable') {
            # code...
            Alert::success('Berhasil', 'Rapat berhasil didaftarkan');
            return view('front-end.peserta.rapat-disable');

        }


        Participant::create([
            'id' => Str::uuid(),
            'confrence' => Auth::user()->id,
            'opd_id' => Auth::user()->profil->opd_id,
            'location_id' => $request->location,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);
        Alert::success('Berhasil', 'Rapat berhasil didaftarkan');
        return redirect()->route('confrence.index');
    }
}
