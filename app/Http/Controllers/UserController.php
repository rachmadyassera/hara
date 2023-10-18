<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json() //memanggil data json untuk datatable server
    {
        return DataTables::of(User::query())->toJson();
    }

    public function index()
    {
        $datauser = User::with('opd')->latest()->whereNot('name','developer')->get();
        return view('Admin.User.index', compact('datauser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opd = Opd::latest()->get()->where('status','enable');
        return view('Admin.User.add', compact('opd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $check_email = User::where('email',$request->email)->first();
        // dd($request->opd);
        if (empty($check_email)){

            $newData = new User();
            $newData ->id = Str::uuid();
            $newData ->name =  $request->name;
            $newData ->email = $request->email;
            $newData ->role = $request->role;
            $newData ->password = bcrypt('1234');
            $newData ->save();

            Profil::create([
                'id' => Str::uuid(),
                'user_id' => $newData->id,
                'opd_id' => $request->opd,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'nohp' => $request->nohp
            ]);

            Alert::success('Berhasil', 'Akun pengguna berhasil didaftarkan');
            return back();


        }else{
            Alert::warning('Oops', 'Emailnya sudah terdaftar, silahkan gunakan email yang lain.');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $opd = Opd::latest()->get()->where('status','enable');

        return view('Admin.User.edit', compact('opd','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        $profil = Profil::find($request->idprofil);
        $profil->opd_id = $request->opd;
        $profil->save();

        Alert::success('Berhasil', 'Akun pengguna berhasil diperbaharui');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Success', 'You\'ve Successfully Deleted');
        return redirect()->route('user.index');
    }

    // =================== other function =================================

    public function reset_pass($id)
    {
        $user = User::find($id);
        $user->password = bcrypt('1234');
        $user->save();

        Alert::success('Berhasil', 'Password pengguna telah direset !');
        return back();

    }
}
