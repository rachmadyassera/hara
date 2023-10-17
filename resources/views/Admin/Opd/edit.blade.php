@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Pembaharuan data organisasi perangkat daerah</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('opd.update', $opd->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="nama" class="form-control" required value="{{$opd->nama}}">
                    </div>
                    <div class="form-group">
                        <label>Alamat </label>
                        <input type="text" name="alamat" class="form-control" required value="{{$opd->alamat}}">
                    </div>
                    <div class="form-group">
                        <label>Longitude </label>
                        <input type="text" name="longitude" class="form-control" required value="{{$opd->longitude}}">
                    </div>
                    <div class="form-group">
                        <label>Latitude </label>
                        <input type="text" name="latitude" class="form-control" required value="{{$opd->latitude}}">
                    </div>
                    <div class="text-right">
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
