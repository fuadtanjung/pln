@extends('layouts.template')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Rekap Laporan Aset Jaringan</h4>
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
                        <a href="/rekapasetjaringan">Rekap Laporan Aset Jaringan</a>
                    </li>
        </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Rekap Laporan Aset Jaringan</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group">
                            <a href="{{route('print.jaringan')}}">
                                 <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#addMaster"><i class="fas fa-print"></i> Cetak Laporan</button>
                            </a>
                            <a href="{{route('excel.jaringan')}}">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#addMaster"><i class="fas fa-file-excel"></i> Export </button>
                                 </a>
                            <table id="basic-datatables" class="display table table-striped table-hover">
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

                                        <td>




                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>



                            </table>
                        </div>
                    </div>
                </div>


@endsection