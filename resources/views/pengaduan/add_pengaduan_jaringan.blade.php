@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">+ Tambah Pengaduan Kerusakan Aset Jaringan</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('add.jaringan') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Aset</label>
                                    <select name="masterjaringan_select" class="form-control" id="id_master_jaringan">
                                        @foreach($master_aset_jaringan as $master)
                                        <option value="{{$master->id_master_jaringan}}">{{$master->nama_master_jaringan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleFormControlInput1">Ruangan</label>

                                    <input type="text" class="form-control" id="ruangan">

                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Unit</label>
                                    <input type="text" class="form-control" id="unit_id" name ="unit_id" value ="{{auth()->user()->pegawai->unit->nama_unit}}"readonly>
                                </div>
                                {{-- status --}}
                                 {{-- <label for="exampleFormControlInput1">Status</label> --}}
                                 <input type="hidden" class="form-control" id="status_pengaduan" name="status_pengaduan" value="Diajukan">

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tanggal Pengaduan</label>
                                    <input type="date"  value="{{date('Y-m-d')}}" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto Aset</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="exampleFormControlInput1">Tanggapan</label> --}}
                                    <input type="text" class="form-control" id="tanggapan" name="tanggapan" hidden>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

@endsection

@section('javascript')
<script>
    //change paste keyup
    $('#nama_master_jaringan').on('change paste keyup', function (){
        var url = "{{ url('/pengaduan/view/addjaringan') }}"
        $.ajax({
            url: url+"/"+$('#nama_master_jaringan').val(),
            method: "GET",
            success: function(data){
                if(data){

                    $('#ruangan').val(data.ruangan);

                }

            },
            error: function(error){
                console.log("error");
            }
        })
    })

</script>
@endsection