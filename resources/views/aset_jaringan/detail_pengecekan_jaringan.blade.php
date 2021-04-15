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
                            <div class="card-title">Detail & Edit Pengecekan Aset Jaringan</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updatedetail.pengecekanjaringan')}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <div class="row">
                                <div class="col-md-8 col-lg-6">
                                    <div class="form-group" id="editPengecekan">

                                            <input type="text" class="form-control no_seri_asset" style="display: none;" id="no_seri"
                                                name="id_master_jaringan" value="{{$detail_pengecekan_jaringan->id_master_jaringan}}" readonly>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nomor Seri</label>
                                                <input type="text" class="form-control no_seri_asset" id="edit_no_seri"
                                                    name="no_seri" value="{{$detail_pengecekan_jaringan->no_seri}}" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tangal Pengecekan</label>
                                                <input type="text" class="form-control" id="edit_tgl_pengecekan" value="{{$detail_pengecekan_jaringan->tgl_pengecekan}}"
                                                    name="tgl_pengecekan" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">NIP Petugas</label>
                                                <input type="text" class="form-control" id="edit_nip_petugas"
                                                    name="nip_petugas" value="{{$detail_pengecekan_jaringan->nip_petugas}}" required readonly>
                                            </div>

                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-6">
                                    <div class="form-group" id="addUnit">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama Aset</label>
                                                <input type="text" class="form-control input_nama_asset" id="edit_nama_master_jaringan"
                                                    name="nama_master_jaringan" value = "{{$detail_pengecekan_jaringan->nama_master_jaringan}}"  required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tipe Aset</label>
                                                <input type="text" class="form-control" id="edit_tipe" value="{{$detail_pengecekan_jaringan->tipe}}"
                                                    name="tipe" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Kondisi Aset</label>
                                                <select class="form-control" id="edit_kondisi" name="kondisi" required>
                                                <option value="">--Pilih Kondisi--</option>
                                                @if( $detail_pengecekan_jaringan->kondisi=='Baik')
											    <option value="Baik"  selected="selected">Baik</option>
                                                <option value="Buruk">Buruk</option>
                                                @elseif($detail_pengecekan_jaringan->kondisi=='Buruk')
                                                <option value="Baik">Baik</option>
                                                <option value="Buruk" selected="selected">Buruk</option>
                                                @endif
											    </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4">

                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-lg" value="" name="modal">Simpan Perubahan</button>
                                    <form action="{{route('deletedetail.pengecekanjaringan',[$detail_pengecekan_jaringan->no_seri])}}"
                                        method="post"
                                        onclick="return confirm('Anda yakin menghapus data ?')">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg" value="" name="modal">Hapus</button>
                                    </form>
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

