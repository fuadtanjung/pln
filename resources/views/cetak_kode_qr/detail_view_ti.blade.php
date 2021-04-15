@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Cetak Kode QR</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{route('view.cetakqr')}}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Detail Aset TI</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6 ">No Seri</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->no_seri}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>

                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Tahun Aset</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->tahun_aset}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Nama OS</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->os_id}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Lisensi</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->lisensi}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Merek CPU</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->cpu_merek}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Merek Monitor</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->monitor_merek}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Status</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->status}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Serial Number</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->serial_number}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">IP Address</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->ip_address}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-2 col-lg-6">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Mac Address</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->mac_address}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Kapasitas memori</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->kapasitas_memori}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Merk Processor</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->processor_merek}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Kapasitas Processor</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->kapasitas_processor}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Tipe VGA</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->vga_tipe}}
                                            <div for="inlineinput" class="col-md-8 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Kapasitas VGA</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->vga_kapasitas}}
                                            <div for="inlineinput" class="col-md-8 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6">Kapasitas HDD</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$pengecekan_ti->hdd_kapasitas}}
                                            <div for="inlineinput" class="col-md-8 ">
                                            </div>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection
