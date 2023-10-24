@extends('layouts.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data peserta {{ $rapat->judul }}</h4>
                <div class="card-header-action">
                    {{--  --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Nama </td>
                                <td>Instansi </td>
                                <td>No HP </td>
                                <td style="width: 25%" class="text-center">Tandatangan </td>
                                <td style="width: 120px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($peserta as $pst )
                            <tr>
                                <td style="vertical-align: middle; ">{{$pst->nama}}</td>
                                <td style="vertical-align: middle; ">{{$pst->instansi}}</td>
                                <td style="vertical-align: middle; ">{{$pst->nohp}}</td>
                                <td style="vertical-align: middle;  ">
                                    <center><img  style="width: 50%" src="{{ asset('upload/'.$pst->tandatangan) }}" alt=""></center>

                                </td>
                                <td style="vertical-align: middle;">
                                    <ul class="nav">
                                        <a href="/confrence/disable-participant/{{$pst->id}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a>
                                    </ul>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

@endsection
