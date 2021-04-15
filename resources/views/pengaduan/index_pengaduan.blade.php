@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengaduan Kerusakan Aset</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kelompok Aset untuk Pengaduan</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('view.pengaduan')}}" method="get">
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
                                <br><br>
                                <h10>* Kelompok Aset TI untuk aset : Komputer, Laptop, Printer, Scanner</h10>
                                <h5>* Kelompok Aset Jaringan untuk aset : Access Point, Router, Switch/Hub</h5>
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