<html>
<head>
    <style>
        h3.small {
          line-height: 0.7;
        }

        </style>

</head>
<center>
    <img style="width:7%" src="{{('atlantislite/assets/img/pln.png')}}">
    <h3 class="small">Rekap Laporan Inventarisasi Aset</h3>
    <h3 class="small">Aset Jaringan</h3>
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
        }
        </style>
     <table style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>No Seri</th>
                <th>Tanggal Pengecekan</th>
                <th>Nama Aset</th>
                <th>Nama Ruangan</th>
                <th>Tipe Aset</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_pengecekan_jaringan as $jar)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jar->no_seri }}</td>
                <td>{{$jar->tgl_pengecekan}}</td>
                <td>{{$jar->master_jaringan->nama_master_jaringan}}</td>
                <td>{{$jar->master_jaringan->ruangan->nama_ruangan }}</td>
                <td>{{$jar->tipe}}</td>
                <td>{{$jar->kondisi}}</td>


            </tr>
            @endforeach
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
