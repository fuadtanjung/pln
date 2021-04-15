@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Unit</h4>
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
								<a href="/home">Kelola Data Master</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="/daftarunit">Daftar Unit</a>
							</li>
				</ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Unit</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal"
                                    data-target="#addUnit"><i class="fa fa-plus"></i> Tambah Unit</button>
                                <br>
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Unit</th>
                                            <th scope="col">Jenis Unit</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($units as $unit)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$unit->nama_unit}}</td>
                                            <td>{{$unit->jenisUnit->nama_jenis_unit}}</td>
                                            <td>{{$unit->alamat_unit}}</td>
                                            <td>
                                                <button class="btn btn-primary" id="editButton"
                                                    data-toggle="modal" data-target="#editUnit"
                                                    data-id_unit="{{$unit->id_unit}}"
                                                    data-nama_unit="{{$unit->nama_unit}}"
                                                    data-jenis_id="{{$unit->jenis_id}}"
                                                    data-alamat_unit="{{$unit->alamat_unit}}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit</button></a>

                                                <form action="{{route('delete.unit',[$unit->id_unit]) }}" method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
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
<!-- Modal Input -->
<div class="modal fade" id="addUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store.unit')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Unit</label>
                        <input type="text" class="form-control" id="nama_unit" name="nama_unit" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Unit</label>
                        <select name="jenisselect" class="form-control" id="id_jenis_unit">
                            @foreach($jenis_units as $jenis)
                            <option value="{{$jenis->id_jenis_unit}}">{{$jenis->nama_jenis_unit}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" id="alamat_unit" name="alamat_unit" required>
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
<!-- Modal Update -->
<div class="modal fade" id="editUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.unit')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control" id="edit_id_unit" name="id_unit">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Unit</label>
                        <input type="text" class="form-control" id="edit_nama_unit" name="nama_unit" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Unit</label>
                        <select name="jenisselect" class="form-control" id="edit_jenis">
                            @foreach($jenis_units as $jenis)
                            <option value="{{$jenis->id_jenis_unit}}">{{$jenis->nama_jenis_unit}}</option>c
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" id="edit_alamat_unit" name="alamat_unit" required>
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
            var id_unit = $(this).data("id_unit");
            var nama_unit = $(this).data("nama_unit");
            var jenis_id = $(this).data("jenis_id");
            var alamat_unit = $(this).data("alamat_unit");
            $("#edit_id_unit").val(id_unit);
            $("#edit_nama_unit").val(nama_unit);
            $("#edit_alamat_unit").val(alamat_unit);

            console.log(id_unit);

            $("#edit_jenis > option").each(function () {
                if (this.value == jenis_id) {
                    $(this).attr("selected", "selected");
                }
            });
        })
    })

</script>
@endsection
