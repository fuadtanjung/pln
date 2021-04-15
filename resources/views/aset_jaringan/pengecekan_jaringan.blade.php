@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Inventarisasi Aset Jaringan</h4>
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
                        <a href="/asetjaringan">Aset Jaringan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/asetjaringan">Pengecekan Aset</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pengecekan Aset Jaringan</div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('store.detail_jaringan')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group" id="addUnit">
                                            @foreach($master_aset_jaringan as $master_jaringan)
                                            <input type="text" class="form-control no_seri_asset" style="display: none;"
                                                id="no_seri" name="id_master_jaringan"
                                                value="{{ $master_jaringan->id_master_jaringan }}" readonly>
                                            @endforeach
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nomor Seri</label>
                                                <input type="text" class="form-control no_seri_asset" id="no_seri"
                                                    name="no_seri" value="{{ $no_seri }}" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tangal Pengecekan</label>
                                                <input type="text" class="form-control" id="tgl_pengecekan"
                                                    value="{{date('Y-m-d')}}" name="tgl_pengecekan" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">NIP Petugas</label>
                                                <input type="text" class="form-control" id="nip_petugas"
                                                    name="nip_petugas" value="{{auth()->user()->petugas->nip_petugas}}"
                                                    required readonly>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group" id="addUnit">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama Aset</label>
                                                @foreach($master_aset_jaringan as $master_jaringan)
                                                <input type="text" class="form-control input_nama_asset"
                                                    id="nama_master_jaringan" name="nama_master_jaringan"
                                                    value="{{$master_jaringan->nama_master_jaringan}}" required
                                                    readonly>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tipe Aset</label>
                                                <input type="text" class="form-control" id="tipe" name="tipe" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Kondisi Aset</label>
                                                <select class="form-control" id="kondisi" name="kondisi" required>
                                                    <option value="">--Pilih Kondisi--</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Buruk">Buruk</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4">

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success btn-lg" value=""
                                                name="modal">Simpan</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
