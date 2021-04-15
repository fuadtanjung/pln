@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Rekap Pengaduan Kerusakan Aset</h4>
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
                        <a href="/rekappengaduan">Pengaduan Kerusakan</a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Pengaduan Kerusakan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.statuspengaduan', $id_pengaduan_ti) }}" method="POST" >
                                @csrf
                                @method('PATCH')
                                <input type="text" class="form-control " style="display: none;" id="id_pengaduan_ti"
                                name="id_pengaduan_ti" value="" readonly>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Nama Aset</label>
                                    <input type="text" class="form-control" id="nama_master_ti" name="nama_master_ti" value="{{ $detail_pengaduan_ti->master_aset_ti->nama_master_ti }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Status</label>
                                    <select class="form-control" id="status_pengaduan" name="status_pengaduan">
                                        <option value="0">--Pilih Status--</option>
                                        <option value="Ditanggapi">Ditanggapi</a></option>
                                        <option value="Selesai">Selesai</a></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">NIP PEGAWAI</label>
                                    <input type="text" class="form-control" value ="{{$detail_pengaduan_ti->master_aset_ti->nip_pegawai}}" id="nip_pegawai" name="nip_pegawai" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Pengaduan</label>
                                    <input type="date"  value="{{ $detail_pengaduan_ti->pengaduan_aset_ti->tgl_pengaduan }}" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto Aset</label>
                                </div>
                                <img id="blah" width="500px" height="300px" value=
                                <img src="{{ asset('img/' .$detail_pengaduan_ti->foto) }}" width="500" height="350">">
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"rows="3"
                                    readonly> {{ $detail_pengaduan_ti->keterangan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tanggapan</label>
                                    <textarea class="form-control" id="tanggapan" name="tanggapan"rows="3"
                                    > {{ $detail_pengaduan_ti->tanggapan }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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