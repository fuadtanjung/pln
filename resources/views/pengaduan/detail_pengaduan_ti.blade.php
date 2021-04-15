@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengaduan Kerusakan Aset TI</h4>
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
                        <a href="/pengaduan">Pengaduan Kerusakan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/pengaduan/view">Pengaduan Kerusakan Aset tI</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail Pengaduan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <img src="{{ asset('img/' .$detail_pengaduan_ti->foto) }}" width="500" height="350">
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-6">Nama Aset</label>
                                        <label for="" class="col-md-2 ">:</label>
                                        {{$detail_pengaduan_ti->master_aset_ti->nama_master_ti}}
                                        <div for="inlineinput" class="col-md-4 ">
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-6">Tanggal Pengaduan</label>
                                        <label for="" class="col-md-2 ">:</label>
                                        {{$detail_pengaduan_ti->pengaduan_aset_ti->tgl_pengaduan}}
                                        <div for="inlineinput" class="col-md-4 ">
                                        </div>
                                    </div>
                                    <div class="form-group form-inline" >
                                        <label for="inlineinput" class="col-md-6">Keterangan</label>
                                        <label for="" class="col-md-2 ">:</label>
                                        <p id="keterangan" name="keterangan"rows="5" cols="110">
                                            <br>
                                        {{$detail_pengaduan_ti->keterangan}}
                                        </p >
                                        <div for="inlineinput" class="col-md-4 " readonly>
                                        </div>
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
