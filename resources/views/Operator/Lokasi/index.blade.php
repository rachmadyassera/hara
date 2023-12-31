@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data lokasi</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('location.create')}}"  class="btn btn-icon btn-info"><i class="fas fa-plus-circle"></i> Lokasi baru</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Nama Lokasi</td>
                                <td>Alamat </td>
                                <td>Keterangan </td>
                                <td style="width: 120px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lokasi as $lks )
                            <tr>
                                <td style="vertical-align: middle; ">{{$lks->nama}}</td>
                                <td style="vertical-align: middle; ">{{$lks->alamat}}</td>
                                <td style="vertical-align: middle; ">Didaftarkan oleh : <br> {{$lks->user->name}}, <br> {{$lks->user->profil->opd->nama}} </td>
                                <td style="vertical-align: middle; ">
                                    @if ($lks->user_id == Auth::user()->id)
                                    <ul class="nav">
                                        <a href="{{route ('location.edit', $lks->id)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a> &nbsp;
                                        <a href="/location/disable/{{$lks->id}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a>
                                    </ul>
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{-- Table jika menggunakan serverside --}}
                    {{-- <table id="datatables" class="table table-hover ">
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Role</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                    </table> --}}
                </div>
            </div>
        </div>
</div>

@endsection
