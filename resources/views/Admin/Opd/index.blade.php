@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data Organisasi Perangkat Daerah</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('opd.create')}}"  class="btn btn-icon btn-info"><i class="fas fa-plus-circle"></i> Organiasai baru</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Nama </td>
                                <td>Alamat </td>
                                <td>Longitude </td>
                                <td>Latitude </td>
                                <td>Status </td>
                                <td style="width: 120px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($opd as $od )
                            <tr>
                                <td>{{$od->nama}}</td>
                                <td>{{$od->alamat}}</td>
                                <td>{{$od->longitude}}</td>
                                <td>{{$od->latitude}}</td>
                                <td>
                                    @if ($od->status =='enable')
                                    <div class="badge badge-success">Enable</div>
                                    @else
                                    <div class="badge badge-danger">Disable</div>
                                    @endif
                                </td>
                                <td>
                                    <ul class="nav">
                                        <a href="{{route ('opd.edit', $od->id)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a> &nbsp;
                                        <a href="/opd/disable/{{$od->id}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a>
                                    </ul>
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
