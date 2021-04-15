@extends('layouts.template')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Jenis Aset</h4>
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
								<a href="/daftaraset">Daftar Jenis Aset</a>
							</li>
				</ul>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Jenis Aset</h4>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                                data-target="#addAset"><i class="fas fa-pencil-alt"></i> Tambah Jenis Aset</button>
                                <br>
                            	<table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Aset</th>
                                        <th scope="col">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jenis_asets as $jenis)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$jenis->nama_jenis_aset}}</td>
                                        <td>

                                            <button class="btn btn-primary" id="editButton"
                                                data-toggle="modal"
                                                data-target="#editAset" data-id_jenis_aset="{{$jenis->id_jenis_aset}}"
                                                data-nama_jenis_aset="{{$jenis->nama_jenis_aset}}">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>

                                            <form action="{{ route('delete.aset',[$jenis->id_jenis_aset]) }}"
                                                method="post"
                                                onclick="return confirm('Anda yakin menghapus data ?')"
                                                class="d-inline" data-original-title="Hapus">
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
</div>
<!-- Modal Input -->
<div class="modal fade" id="addAset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store.aset')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Aset</label>
                        <input type="text" class="form-control" id="nama_jenis_aset" name="nama_jenis_aset" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update -->
<div class="modal fade" id="editAset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.aset')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control" id="edit_id_jenis_aset" name="id_jenis_aset">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Aset</label>
                        <input type="text" class="form-control" id="edit_nama_jenis_aset" name="nama_jenis_aset"
                            required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
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
            var id_jenis_aset = $(this).data("id_jenis_aset");
            var nama_jenis_aset = $(this).data("nama_jenis_aset");
            $("#edit_id_jenis_aset").val(id_jenis_aset);
            $("#edit_nama_jenis_aset").val(nama_jenis_aset);
            console.log(id_jenis_aset);
        })
    })

		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});


		});

</script>

@endsection
