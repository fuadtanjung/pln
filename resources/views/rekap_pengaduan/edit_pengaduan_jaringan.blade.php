@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Pengaduan Kerusakan Aset Jaringan</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Nama Aset</label>
                                    <input type="text" class="form-control" id="nama_master_jaringan" name="nama_master_jaringan" value="{{ $detail_pengaduan_jaringan->master_aset_jaringan->nama_master_jaringan}}" readonly>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleFormControlInput1">Ruangan</label>

                                    <input type="text" class="form-control" id="ruangan">

                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Unit</label>
                                    <input type="text" class="form-control" id="unit_id" name ="unit_id" value ="{{auth()->user()->petugas->unit->nama_unit}}" readonly>
                                </div>
                                {{-- status --}}
                                 {{-- <label for="exampleFormControlInput1">Status</label> --}}
                                 <div class="form-group">
                                    <label for="exampleFormControlInput1">Status</label>
                                    <select class="form-control" id="status_pengaduan" name="status_pengaduan">
                                        <option value="0">--Pilih Status--</option>
                                        <option value="Ditanggapi">Ditanggapi</a></option>
                                        <option value="Selesai">Selesai</a></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Pengaduan</label>
                                    <input type="date"  value="{{date('Y-m-d')}}" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto Aset</label>
                                </div>
                                <img id="blah" width="500px" height="300px" value=
                                <img src="{{ asset('img/' .$detail_pengaduan_jaringan->foto) }}" width="500" height="350">">
                                <br>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan" readonly>
                                        {{ $detail_pengaduan_jaringan->keterangan }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tanggapan</label>
                                    <textarea class="form-control" id="tanggapan" name="tanggapan"rows="3"
                                    > {{ $detail_pengaduan_jaringan->tanggapan }}</textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

@endsection
