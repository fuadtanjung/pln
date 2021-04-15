@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pegawai</h4>
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
                        <a href="/daftarpegawai">Data Pegawai</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                                    data-target="#addPegawai"><i class="fas fa-pencil-alt"></i> Tambah Data Pegawai</button>
                                    <br>
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIP</th>
                                            <th>Nama Pegawai</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pegawais as $peg)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$peg->nip_pegawai}}</td>
                                            <td>{{$peg->nama_pegawai}}</td>
                                            <td>{{$peg->user->email}}</td>
                                            <td>{{$peg->user->username}}</td>
                                            <td>{{$peg->user->nip_pegawai}}</td>
                                            <td>

                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-original-title="Edit" data-target="#editPegawai"
                                                    id="editButton">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </button>

                                                <form action="" method="post"
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

        <!-- Modal Input -->
        <div class="modal fade bd-example-modal-lg" id="addPegawai" tabindex="1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('view.daftar_pegawai')}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text">Nomor Induk Pegawai</label>
                                        <input type="text" class="form-control" id="nip" name="nip" required>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="email2">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Alamat Pegawai</label>
                                        <input type="text" class="form-control" id="alamat_pegawai"
                                            name="alamat_pegawai" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jabatan Pegawai</label>
                                        <select name="jabatanselect" class="form-control" id="id_jabatan">
                                            @foreach($jabatans as $jabat)
                                            <option value="{{$jabat->id_jabatan}}">{{$jabat->nama_jabatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">No.Hp</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Nama Unit</label>
                                        <select name="unitselect" class="form-control" id="id_unit">
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id_unit}}">{{$unit->nama_unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Role</label>
                                        <select name="roleselect" class="form-control" id="id_role">
                                            @foreach($role as $ro)
                                            <option value="{{$ro->id_role}}">{{$ro->nama_role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="modal2" name="modal">Save
                                    changes</button>
                            </div>

                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    $(document).ready(function () {
        $('#basic-datatables').DataTable({});

        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                            )
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });


    });

</script>

@endsection
