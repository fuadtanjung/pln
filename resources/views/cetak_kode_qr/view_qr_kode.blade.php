@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Cetak Kode QR</h4>
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
                        <a href="/home">Cetak Kode QR</a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pilih Kelompok Aset</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('view.cetakqr')}}" method="get">
                                @csrf
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 col-form-label">Kelompok Aset</label>
                                    <div class="col-md-9 p-0">
                                        <select class="form-control input-full" id="inlineinput" name ="pilihaset"
                                            placeholder="Enter Input">
                                            <option value="0">--Pilih Kelompok Aset--</option>
                                            <option value="Asetti">Aset TI</a></option>
                                            <option value="Asetjaringan">Aset Jaringan</a></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
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
