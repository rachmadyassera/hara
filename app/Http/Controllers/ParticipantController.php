<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Confrence;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ParticipantController extends Controller
{
    //
    public function presence($id)
    {
        //
        $datenow =Carbon::now();
        $rapat = Confrence::find($id);
        if ($rapat->status == 'disable') {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.peserta.rapat-disable');
        }
        // dd($datenow->toDateString(),$rapat->tanggal);
        if ($rapat->tanggal !== $datenow->toDateString()) {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.peserta.rapat-disable');
        }
        return view('front-end.peserta.formulir-kehadiran', compact('rapat'));
    }

    public function store(Request $request)
    {
        //
        $datenow =Carbon::now();
        $rapat = Confrence::find($request->confrence);
        if ($rapat->status == 'disable') {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.peserta.rapat-disable');
        }
        if ($rapat->tanggal !== $datenow->toDateString()) {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.peserta.rapat-disable');
        }

        $uuid = Str::uuid();

        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $uuid . '.'.$image_type;
        file_put_contents($file, $image_base64);

        Participant::create([
            'id' => $uuid,
            'confrence_id' => $request->confrence,
            'nama' => $request->nama,
            'instansi' => $request->instansi,
            'nohp' => $request->nohp,
            'tandatangan' => $uuid.'.'.$image_type
        ]);

        Alert::success('Berhasil', 'Terimakasih telah hadir.');
        return redirect()->route('presence.confrence',$request->confrence);
    }
}
