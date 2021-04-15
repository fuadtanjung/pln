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
                            <h3 class="card-title">Detail Aset Jaringan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6 ">No Seri</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$detail_pengecekan_jaringan->no_seri}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6 ">Tipe</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$detail_pengecekan_jaringan->tipe}}
                                            <div for="inlineinput" class="col-md-4 ">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-6 ">Kondisi</label>
                                            <label for="" class="col-md-2 ">:</label>
                                            {{$detail_pengecekan_jaringan                          ->kondisi}}
                                            <div for="inlineinput" class="col-md-4 ">
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
