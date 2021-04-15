@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">+ Tambah Pengaduan Kerusakan Aset TI</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('add.ti')}}" method="POST" enctype="multipart/form-data" id="form_pengaduan_ti">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Aset</label>
                                    <select name="master_select" class="form-control" id="id_master_ti">
                                        @foreach($master_aset_tis as $master)
                                        <option value="{{$master->id_master_ti}}">{{$master->nama_master_ti}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                    {{-- <label for="exampleFormControlInput1">Status</label> --}}
                                    <input type="hidden" class="form-control" id="status_pengaduan" name="status_pengaduan" value="Diajukan">

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">NIP PEGAWAI</label>
                                    <input type="text" class="form-control" value ="{{auth()->user()->pegawai->nip_pegawai}}" id="nip_pegawai" name="nip_pegawai" readonly>
                                </div>

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
                                    <textarea class="form-control" id="keterangan" name="keterangan"rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="exampleFormControlInput1">Tanggapan</label> --}}
                                    <input type="text" class="form-control" id="tanggapan" name="tanggapan" hidden>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="simpan_pengaduan_ti">Save changes</button>
                                </div>
                            </form>
                        </div>

@endsection

@section('javascript')
<script>
    //change paste keyup
    // $(document).on("click","#simpan_pengaduan_ti",function(){
    //     var url2 = "{{ route('add.pengaduan_ti') }}";
    //     console.log($("#foto").prop('files')[0]);

    //     $.ajax({
    //         url: url2,
    //         method: 'POST',
    //         data: {
    //             // id_master_ti: $("#id_master_ti").val(),
    //             // status_pengaduan: $("#status_pengaduan").val(),
    //             // nip_pegawai: $("#nip_pegawai").val(),
    //             // tgl_pengaduan: $("#tgl_pengaduan").val(),
    //             // foto: $("#foto").prop('files')[0],
    //             // keterangan: $("#keterangan").val(),
    //         },
    //         success: function(data){
    //             console.log(data);
    //             history().go(-1)
    //         }
    //     })
    // })

    $('#no_seri').on('change paste keyup', function (){
        var url = "{{ url('/pengaduan/view/addti') }}"
        $.ajax({
            url: url+"/"+$('#no_seri').val(),
            method: "GET",
            success: function(data){
                if(data){
                    $('#nama_aset').val(data.nama_master_ti);
                    $('#nama_pegawai').val(data.nip_pegawai);
                }
            },
            error: function(error){
                console.log("error");
            }
        })
    })

</script>
@endsection

