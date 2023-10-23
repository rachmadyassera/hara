@extends('front-end.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<style>
    .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{
        width: 100% !important;
        height: auto;
    }
</style>

<section class="section">
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Selamat datang peserta kegiatan {{ $rapat->judul }}</h4>
            </div>
            <div class="card-body">
                <p>Pelaksanaan kegiatan,</p>
                <table>
                    <tr>
                        <td>
                            {{ $carbon::parse($rapat->tanggal)->isoFormat('dddd, D MMMM Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lokasi: <br>
                            {{ $rapat->location->nama }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ $rapat->keterangan }}
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
            <h4>Mohon untuk mengisi daftar hadir</h4>
            </div>
            <div class="card-body">

                <form action="{{route('participant.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="confrence" value="{{ $rapat->id }}" class="form-control" required>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <textarea name="instansi"  class="form-control" style="height: 60px;" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="nohp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="" for="">Signature:</label>
                        <br/>
                            <div id="sig" ></div>
                        <br/>
                        <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
            <div class="card-footer bg-whitesmoke">
                Penyelenggara daftar hadir kegiatan : <br>{{ $rapat->opd->nama }}
            </div>
        </div>
    </div>
  </section>
  <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  <script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
@endsection
