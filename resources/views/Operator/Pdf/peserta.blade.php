
<!DOCTYPE html>
<html>
<head>
    <title>{{ $rapat->judul }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
@inject('carbon', 'Carbon\Carbon')
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <td style="vertical-align: middle; " rowspan="3"  style="width:150px">
                    <div class="text-left">
                    <img  style="width: 120%" src="{{ public_path('logo/logo-pemko.png') }}" alt="">
                    </div>
                </td>
                <td style="vertical-align: middle; " class="text-center"><h4>PEMERINTAH KOTA TANJUNGBALAI</h4></td>
            </tr>
            <tr>
                <td style="vertical-align: middle; " class="text-center"><h3>{{ $rapat->opd->nama }}</h3></td>
            </tr>
            <tr>
                <td style="vertical-align: middle; " class="text-center"><h6>{{ $rapat->opd->alamat }}</h6></td>
            </tr>
        </thead>
    </table>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <h4><center>Daftar Hadir Peserta</center></h4>
    <table>
        <thead>
            <tr>
                <td style="vertical-align: top; width: 100px;" class="text-left"> Acara </td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $rapat->judul }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; width: 100px; " class="text-left"> Tanggal </td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $carbon::parse($rapat->tanggal)->isoFormat('dddd, D MMMM Y') }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; width: 100px;" class="text-left"> Keterangan </td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $rapat->keterangan }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; width: 100px;" class="text-left"> Jumlah Hadir</td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $peserta->count() }} Peserta</td>
            </tr>
        </thead>
    </table>
<br>
    <table border="1" class="table table-bordered">
        <tr>
            <th >No</th>
            <th>Nama</th>
            <th style="width: 175px">Instansi</th>
            <th>No HP</th>
            <th style="width: 150px"><center>Tandatangan</center></th>
        </tr>
        @foreach($peserta as $pst)
        <tr>
            <td style="vertical-align: middle; ">{{ $loop->iteration }}</td>
            <td style="vertical-align: middle; ">{{ $pst->nama }}</td>
            <td style="vertical-align: middle; ">{{ $pst->instansi }}</td>
            <td style="vertical-align: middle; ">{{ $pst->nohp }}</td>
            <td style="vertical-align: middle; "><center>
                <img  style="width: 75%" src="{{ public_path('upload/'.$pst->tandatangan) }}" alt="">
                </center></td>
        </tr>
        @endforeach
    </table>

</body>
</html>
