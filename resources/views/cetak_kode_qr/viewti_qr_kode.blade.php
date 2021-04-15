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
                        <a href="/kodeQR">Cetak Kode QR Aset TI</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pengecekan Aset TI</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No. Seri</th>
                                            <th scope="col">Nama Aset</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">Kondisi</th>
                                            <th scope="col">Kode QR</th>
                                            <th scope="col">Aksi</th>
                                            <th scope="col">Details</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_aset_tis as $detailti)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$detailti->no_seri }}</td>
                                            <td>{{$detailti->master_aset_ti->nama_master_ti }}</td>
                                            <td>{{$detailti->nip_pegawai }}</td>
                                            <td>{{$detailti->kondisi }}</td>
                                            <td>
                                                <div class="visible-print">
                                                    {!! QrCode::size(50)->generate(route('detail.cetakqr',[$detailti->no_seri])); !!}
                                                </div>
                                            </td>
                                            <td>
                                            <form action="{{ route('view.qrcode') }}" method="get" name="cetak_count" class="form_qr">
                                            @csrf
                                                <input type="checkbox" name="cetak[]" class="count_cetak" value="{{ $detailti->no_seri }}">

                                                {{-- <input type="hidden" name="no_seri[]" value="{{$detailti->no_seri}}">
                                                <input type="hidden" name="status[]" value="{{$detailti->status}}">
                                                <input type="hidden" name="data_cetak" class="data_cetak"> --}}
                                            </td>
                                            <td>
                                                <a href="{{route('detail.cetakqr',['no_seri'=>$detailti->no_seri, 'status'=>$detailti->status])}}" button
                                                    class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                    Details</button>
                                                </a>
                                                {{-- <a href="{{route('qr.print',['no_seri'=>$detailti->no_seri, 'status'=>$detailti->status])}}" button
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary cetak_button" value="cetak_count" name="cetak_qr"> <i class="fas fa-print"></i> Cetak Kode QR
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
