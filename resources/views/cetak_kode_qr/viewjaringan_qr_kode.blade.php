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
                        <a href="/kodeQR">Cetak Kode QR</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/kodeQR">Cetak Kode QR Aset Jaringan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pengecekan Aset Jaringan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No.Seri</th>
                                            <th scope="col">Nama Aset</th>
                                            <th scope="col">Nama Ruangan</th>
                                            <th scope="col">Kondisi</th>
                                            <th scope="col">Kode QR</th>
                                            <th scope="col">Aksi</th>
                                            <th scope="col">Details</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_pengecekan_jaringan as $detailjar)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$detailjar->no_seri }}</td>
                                            <td>{{$detailjar->master_jaringan->nama_master_jaringan }}</td>
                                            <td>{{$detailjar->master_jaringan->ruangan->nama_ruangan }}</td>
                                            <td>{{$detailjar->kondisi}}</td>
                                            <td>
                                                <div class="visible-print">
                                                    {!! QrCode::size(50)->generate(route('detailjaringan.cetakqr',[$detailjar->no_seri])); !!}
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('view.qrcodejaringan') }}" method="POST" name="cetak_count" class="form_qr">
                                                @csrf
                                                    <input type="checkbox" name="cetak[]" class="count_cetak" value="{{$detailjar->no_seri }}">
                                            </td>
                                            <td>
                                                <a href="{{route('detailjaringan.cetakqr' , [$detailjar->no_seri])}}"
                                                    button class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                    Details</button>
                                                </a>
                                                {{-- <a href="{{route('qr.jaringanprint',['no_seri'=>$detailjar->no_seri])}}" button
                                                    class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                    Cetak QR</button>
                                                </a> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary cetak_button" value="cetak_count" name="cetak_qr"> <i class="fas fa-print"></i> Cetak Kode QR
                                </button>
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
