@extends('layouts.template')

@section('content')
<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

</html>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Rekap Laporan Aset TI</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/home">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/home">Laporan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/rekapasetti">Rekap Laporan Aset TI</a>
                    </li>
                </ul>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <h7><a class="nav-link {{request()->is('rekapasetti') ? 'active' : null}}"
                                href="{{url('rekapasetti')}}" role="tab">Rekap Pengecekan Aset TI</a></h7>
                        </li>
                        <li class="nav-item">
                            <h7><a class="nav-link {{request()->is('rekapasetlain') ? 'active' : null}}"
                                href="{{url('rekapasetlain')}}" role="tab">Rekap Pengecekan Aset Lain</a></h7>
                        </li>

                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane {{request()->is('rekapasetti') ? 'active' : null}}"
                            id="{{url('rekapasetti')}}" role="tabpanel">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <a href="{{route('print.ti')}}">
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#addMaster"><i class="fas fa-print"></i> Cetak
                                                Laporan</button>
                                        </a>
                                        <a href="{{route('excel.ti')}}">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#addMaster"><i class="fas fa-file-excel"></i> Export </button>
                                        </a>
                                        <br>
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <br>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane {{request()->is('rekapasetlain') ? 'active' : null}}"
                            id="{{url('rekapasetlain')}}" role="tabpanel">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <a href="{{route('print.lain')}}">
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#addMaster"><i class="fas fa-print"></i> Cetak
                                                Laporan</button>
                                        </a>
                                        <a href="{{route('excel.lain')}}">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#addMaster"><i class="fas fa-print"></i> Export </button>
                                        </a>
                                        <table id="basic-datatables" class="display table table-striped table-hover">
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
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
