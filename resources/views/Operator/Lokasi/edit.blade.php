@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Pembaharuan data lokasi</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('location.update', $lks->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Lokasi</label>
                        <input type="text" name="nama" class="form-control" required value="{{$lks->nama}}">
                    </div>
                    <div class="form-group">
                        <label>Alamat </label>
                        <input type="text" name="alamat" class="form-control" required value="{{$lks->alamat}}">
                    </div>
                    <div class="text-right">
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
