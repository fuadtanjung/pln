<html>
<head>
    <style>
        .small {
          line-height: 0.7;
        }

        </style>

</head>
<center>
    <img style="width:7%" src="{{('atlantislite/assets/img/pln.png')}}">
    <h3 class="small">Rekap Laporan Inventarisasi Aset</h3>
    <h3 class="small">Aset Perangkat Lain</h3>
    <h3 class="small">PT.PLN (Persero) Wilayah Sumatera Barat</h3>
    <hr size: 1px solid black;>
</center>
<body>
    <h4>Unit : {{auth()->user()->petugas->unit->nama_unit}}</h4>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 12px;
        font-size: 14px;
   }
        }
        </style>
     <table style="width:100%">
        <thead>
            <tr>
                <th>No Seri</th>
                <th>Tanggal Pengecekan</th>
                <th>Nomor Induk Pegawai</th>
                <th>Nama Aset</th>
                <th>Tipe Aset</th>
                <th>Kondisi Aset</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_aset_lains as $detail1)
            <tr>
                <td>{{$detail1->no_seri }}</td>
                <td>{{$detail1->tgl_pengecekan}}</td>
                <td>{{$detail1->nip_pegawai}}</td>
                <td>{{$detail1->master_aset_ti->nama_master_ti}}</td>
                <td>{{$detail1->tipe }}</td>
                <td>{{$detail1->kondisi}}</td>

                @endforeach
            </tr>
        </tbody>
     </table>
</body>

<style>
.right
{ text-align: right;}
</style>

<h4 class="right">Padang , {{date('Y-m-d')}} </h4>
<br><br><br>
<h4 class="right">{{auth()->user()->petugas->nama_petugas}}</h4>
<h4 class="right">NIP .{{auth()->user()->petugas->nip_petugas}} </h4>

</html>
