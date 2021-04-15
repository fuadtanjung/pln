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
    <h3 class="small">Aset TI</h3>
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
        font-size: 5px;
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
                <th>Tahun Aset</th>
                <th>Nama OS</th>
                <th>Lisensi OS</th>
                <th>Merek CPU</th>
                <th>Merek Monitor</th>
                <th>Kondisi Aset</th>
                <th>Status Aset</th>
                <th>Serial Number</th>
                <th>IP Adress</th>
                <th>MAC Address</th>
                <th>Kapasitas Memori</th>
                <th>Merek Processor</th>
                <th>Kapasitas Processor</th>
                <th>Tipe VGA</th>
                <th>Kapasitas VGA</th>
                <th>Kapasitas HDD</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_aset_tis as $detail)
                                    <tr>
                                        <td>{{$detail->no_seri }}</td>
                                        <td>{{$detail->tgl_pengecekan}}</td>
                                        <td>{{$detail->nip_pegawai}}</td>
                                        <td>{{$detail->master_aset_ti->nama_master_ti}}</td>
                                        <td>{{$detail->tahun_aset }}</td>
                                        <td>{{$detail->os->nama_os}}</td>
                                        <td>{{$detail->lisensi}}</td>
                                        <td>{{$detail->cpu_merek}}</td>
                                        <td>{{$detail->monitor_merek}}</td>
                                        <td>{{$detail->kondisi}}</td>
                                        <td>{{$detail->status}}</td>
                                        <td>{{$detail->serial_number}}</td>
                                        <td>{{$detail->ip_address}}</td>
                                        <td>{{$detail->mac_address}}</td>
                                        <td>{{$detail->kapasitas_memori}}</td>
                                        <td>{{$detail->processor_merek}}</td>
                                        <td>{{$detail->kapasitas_processor}}</td>
                                        <td>{{$detail->vga_tipe}}</td>
                                        <td>{{$detail->vga_kapasitas}} </td>
                                        <td>{{$detail->hdd_kapasitas}}</td>


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
