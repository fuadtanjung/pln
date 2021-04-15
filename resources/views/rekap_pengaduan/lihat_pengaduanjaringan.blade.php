@extends('layouts.template')

@section('content')
<style>
    .label {
      color: white;
      padding: 2px;
    }

    .success {background-color: #4CAF50;} /* Green */
    .danger {background-color: #f44336;} /* Red */
    .warning {background-color: #ff9800;} /* Orange */

    </style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Rekap Pengaduan Kerusakan Aset Jaringan</h4>
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
                        <a href="/rekappengaduanjaringan">Pengaduan Aset Jaringan</a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rekap Pengaduan Aset Jaringan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No.Seri Aset</th>
                                            <th scope="col">Nama Aset</th>
                                            <th scope="col">Tgl Pengaduan</th>
                                            <th scope="col">Detail Pengaduan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($detail_pengaduan_jaringan as $detail)
                                            <td>{{$loop->iteration }}</td>
                                            <td></td>
                                            <td>{{ $detail->master_aset_jaringan->nama_master_jaringan }}</td>
                                            <td>{{ $detail->pengaduan_aset_jaringan->tgl_pengaduan }}</td>
                                            <td>
                                                <a href="{{ route('detail.rekappengaduan_jaringan', $detail->id_pengaduan_jaringan) }}"
                                                    button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Detail Pengaduan">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                @if ($detail->status_pengaduan=='Ditanggapi')
                                                <span class=" badge badge-info badge-lg">{{ ($detail->status_pengaduan)}}</span>
                                                @elseif ($detail->status_pengaduan=='Diajukan')
                                                <span class=" badge badge-warning">{{ ($detail->status_pengaduan)}}</span>
                                                @elseif ($detail->status_pengaduan=='Selesai')
                                                <span class="badge badge-success">{{ ($detail->status_pengaduan)}}</span></td>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('viewupdate.jaringan', [$detail->id_pengaduan_jaringan]) }}"
                                                    button type= "button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                            </td>




                                    </tr>
                                    @endforeach



                                </tbody>


                                </table>

                            </div>

@endsection