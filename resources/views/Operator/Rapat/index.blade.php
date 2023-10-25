@extends('layouts.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data seluruh rapat </h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('confrence.create')}}"  class="btn btn-icon btn-info"><i class="fas fa-plus-circle"></i> Rapat baru</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Judul</td>
                                <td>Dilaksanakan </td>
                                <td>Keterangan </td>
                                <td>Qr Code </td>
                                <td style="width: 120px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rapat as $rpt )
                            <tr>
                                <td style="vertical-align: top; ">{{$rpt->judul}}</td>
                                <td style="vertical-align: top; ">{{ $carbon::parse($rpt->tanggal)->isoFormat('dddd, D MMMM Y') }} , <br>
                                    Lokasi : <br> {{$rpt->location->nama}}, <br>
                                    {{$rpt->location->alamat}}
                                </td>
                                <td style="vertical-align: top; ">{{$rpt->keterangan}}</td>
                                <td style="vertical-align: top; ">
                                    {!! QrCode::size(100)->generate(route ('presence.confrence', $rpt->id)); !!}
                                </td>
                                <td style="vertical-align: top;">
                                    <ul class="nav">
                                        <a href="{{route ('confrence.edit', $rpt->id)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a> &nbsp;
                                        <a href="/confrence/disable/{{$rpt->id}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a> &nbsp;
                                        <a href="{{route ('confrence.show', $rpt->id)}}" class="btn-sm btn-success"><i class="fa fa-address-book"></i></a>&nbsp;
                                        <a href="{{route ('presence.confrence', $rpt->id)}}" class="btn-sm btn-info" target="_blank"> <i class="fa fa-pen-nib"></i></a>
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
