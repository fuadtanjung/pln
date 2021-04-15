@extends('layouts.template')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <div class="page-title">Inventarisasi Aset TI Pegawai</div>
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
                            <a href="/home">Inventarisasi Aset</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="/asetti">Aset TI</a>
                        </li>
            </ul>
                </div>

                <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Daftar Aset Pegawai</div>
                        </div>
                            <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nomor Induk Pegawai</th>
                                                    <th scope="col">Nama Pegawai</th>
                                                    <th scope="col">Jabatan</th>
                                                    <th scope="col">Unit</th>
                                                    <th scope="col">No.Hp</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                                <tr>
                                                    @foreach($pegawais as $pegawai)
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$pegawai->nip_pegawai}}</td>
                                                    <td>{{$pegawai->nama_pegawai}}</td>
                                                    <td>{{$pegawai->jabatan->nama_jabatan}}</td>
                                                    <td>{{$pegawai->unit->nama_unit}}</td>
                                                    <td>{{$pegawai->no_hp}}</td>
                                                    <td>
                                                        <a href="{{route('master.aset',[$pegawai->nip_pegawai])}}"
                                                            button class="btn btn-primary" id="Button"><i class="fas fa-clipboard-check"></i>
                                                            Cek Aset TI</button></a>
                                                    </td>

                                                </tr>
                                            </thead>
                                            @endforeach
                                            <tbody>

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
