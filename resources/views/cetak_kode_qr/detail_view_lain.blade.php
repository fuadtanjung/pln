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
                                <h3 class="card-title">Detail Aset Lain</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3 ">No Seri</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" class="form-control input-full" id="no_seri" name="no_seri"
                                            value="{{$pengecekan_lain->no_seri}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3">Tipe</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" class="form-control input-full" id="no_seri" name="no_seri"
                                            value="{{$pengecekan_lain->tipe}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="inlineinput" class="col-md-3">Kondisi</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" class="form-control input-full" id="no_seri" name="no_seri"
                                            value="{{$pengecekan_lain->kondisi}}" readonly>
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
