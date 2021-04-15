@extends('layouts.template')

@section('content')
<div class="section-body">
    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Data Aset TI Pribadi</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#addMaster">Tambah Aset</button>
                                        <br><br>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nomor Induk Pegawai</th>
                                                    <th scope="col">Jenis Aset</th>
                                                    <th scope="col">Nama Aset</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($master_aset_tis as $master)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$master->nip_pegawai}}</td>
                                                    <td>{{$master->jenis_aset->nama_jenis_aset}}</td>
                                                    <td>{{$master->nama_master_ti}}</td>
                                                    <td>
                                                        <a href=# button class="btn btn-primary" id="editButton"
                                                            data-toggle="modal" data-target="#editMaster"
                                                            data-id_master_ti="{{$master->id_master_ti}}"
                                                            data-nip_pegawai="{{$master->nip_pegawai}}"
                                                            data-jenis_aset_id="{{$master->jenis_aset_id}}"
                                                            data-nama_master_ti="{{$master->nama_master_ti}}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit</button></a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            </tbody>
                                        </table>
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
</div>
</div>
</div>
</div>
<!-- Modal Input -->
<div class="modal fade" id="addMaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Aset Pribadi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store.masterti')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Induk Pegawai</label>
                        @foreach($pegawais as $pegawai)
                        <input type="text" class="form-control" id="nip_pegawai" name="nip_pegawai"
                            value="{{auth()->user()->pegawai->nip_pegawai}}" required readonly>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Aset</label>
                        <select name="jenisselect" class="form-control" id="id_jenis_aset">
                            @foreach($jenis_asets as $jenis)
                            <option value="{{$jenis->id_jenis_aset}}">{{$jenis->nama_jenis_aset}}</option>c
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Aset</label>
                        <input type="text" class="form-control" id="nama_master_ti" name="nama_master_ti" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--  -->


<!-- Modal Update -->
<div class="modal fade" id="editMaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Aset Pribadi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.masterti')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control" id="edit_id_master_ti" name="id_master_ti">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Induk Pegawai</label>
                        @foreach($pegawais as $pegawai)
                        <input type="text" class="form-control" id="edit_nip_pegawai" name="nip_pegawai"
                            value="{{$pegawai->nip_pegawai}}" required readonly>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Aset</label>
                        <select name="jenisselect" class="form-control" id="edit_id_jenis_aset">
                            @foreach($jenis_asets as $jenis)
                            <option value="{{$jenis->id_jenis_aset}}">{{$jenis->nama_jenis_aset}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Aset</label>
                        <input type="text" class="form-control" id="edit_nama_master_ti" name="nama_master_ti" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $(document).ready(function () {
        $(document).on("click", "#editButton", function () {
            var id_master_ti = $(this).data("id_master_ti");
            var nip_pegawai = $(this).data("nip_pegawai");
            var jenis_aset_id = $(this).data("jenis_aset_id");
            var nama_master_ti = $(this).data("nama_master_ti");
            $("#edit_id_master_ti").val(id_master_ti);
            $("#edit_nip_pegawai").val(nip_pegawai);
            $("#edit_nama_master_ti").val(nama_master_ti);

            console.log(id_master_ti);

            $("#edit_id_jenis_aset > option").each(function () {
                if (this.value == jenis_aset_id) {
                    $(this).attr("selected", "selected");
                }
            });

        })
    })

</script>
@endsection
