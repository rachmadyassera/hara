@extends('front-end.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')

<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand">
                S I A K R A
                <p> Sistem Informasi Absensi Kehadiran Rapat</p>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title">RAPAT HARI INI</h4>
                    <div class="card-header-action">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- Table clientside --}}
                        <table id="datatables" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td style="width: 130px">Judul</td>
                                    <td style="width: 170px">Dilaksanakan pada </td>
                                    <td>Keterangan </td>
                                    <td>Jumlah Hadir </td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($rapat as $rpt )
                                <tr>
                                    <td style="vertical-align: top; ">{{$loop->iteration}}</td>
                                    <td style="vertical-align: top; ">{{$rpt->judul}}</td>
                                    <td style="vertical-align: top; "> {{$rpt->location->nama}}, <br>
                                        {{$rpt->location->alamat}}
                                    </td>
                                    <td style="vertical-align: top; ">{{$rpt->keterangan}}</td>
                                    <td style="vertical-align: top; ">{{$rpt->participant->where('status','enable')->count()}}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <a href="{{ url('/login') }}" class="btn btn-round btn-lg btn-primary">Buat Formulir Kehadiran Rapat</a>
            </div>
            <div class="simple-footer">
              Copyright © Bidang APTIKA - Dinas Komunikasi dan Informatika Kota Tanjungbalai
            </div>
          </div>

      </div>
    </div>
  </section>
@endsection
