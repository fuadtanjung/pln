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
        </ul>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Daftar Aset Jaringan</div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal"
                                data-target="#addJaringan"><i class="fa fa-plus"></i>Tambah Aset Jaringan</button>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Jenis Aset</th>
                                        <th scope="col">Nama Aset</th>
                                        <th scope="col">Nama Ruangan</th>
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Pengecekan Aset</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($master_aset_jaringan as $master_jaringan)
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$master_jaringan->jenis_aset->nama_jenis_aset}}</td>
                                    <td>{{$master_jaringan->nama_master_jaringan}}</td>
                                    <td>{{$master_jaringan->ruangan->nama_ruangan}}</td>

                                    <td>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editmasterjaringan" id="editButton"
                                                data-id_master_jaringan="{{$master_jaringan->id_master_jaringan}}"
                                                data-jenis_aset_id="{{$master_jaringan->jenis_aset_id}}"
                                                data-nama_master_jaringan="{{$master_jaringan->nama_master_jaringan}}"
                                                data-ruangan_id="{{$master_jaringan->ruangan_id}}"
                                                data-original-title="Edit">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>

                                            <form action="{{route('delete.masterjaringan',[$master_jaringan->id_master_jaringan])}}"
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
                                    <td>
                                        @if($master_jaringan->jenis_aset->nama_jenis_aset == 'Access Point' )
                                            @if(!$detail_pengecekan_jaringan->where('id_master_jaringan',$master_jaringan->id_master_jaringan)->first())
                                            <a href="{{route('master.jaringan', [$master_jaringan->jenis_aset->id_jenis_aset, $master_jaringan->ruangan_id, $master_jaringan->id_master_jaringan])}}"
                                            button class="btn btn-success">
                                            <i class="fas fa-clipboard-check"></i>
                                                Cek Aset Jaringan</button>
                                            </a>
                                            @else
                                            <a href="{{route('viewdetail.pengecekanjaringan', [$master_jaringan->jenis_aset->id_jenis_aset, $master_jaringan->ruangan_id, $master_jaringan->id_master_jaringan])}}"
                                            button class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                                Details & Edit</button>
                                            </a>
                                            @endif

                                        @elseif($master_jaringan->jenis_aset->nama_jenis_aset == 'Router' )
                                            @if(!$detail_pengecekan_jaringan->where('id_master_jaringan',$master_jaringan->id_master_jaringan)->first())
                                            <a href="{{route('master.jaringan', [$master_jaringan->jenis_aset->id_jenis_aset, $master_jaringan->ruangan_id, $master_jaringan->id_master_jaringan])}}"
                                            button class="btn btn-success">
                                            <i class="fas fa-clipboard-check"></i>
                                                Cek Aset Jaringan</button>
                                            </a>
                                            @else
                                            <a href="{{route('viewdetail.pengecekanjaringan', [$master_jaringan->jenis_aset->id_jenis_aset, $master_jaringan->ruangan_id, $master_jaringan->id_master_jaringan])}}"
                                            button class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                                Details & Edit</button>
                                            </a>
                                            @endif

                                        @elseif($master_jaringan->jenis_aset->nama_jenis_aset == 'Switch/Hub' )
                                            @if(!$detail_pengecekan_jaringan->where('id_master_jaringan',$master_jaringan->id_master_jaringan)->first())
                                            <a href="{{route('master.jaringan', [$master_jaringan->jenis_aset->id_jenis_aset, $master_jaringan->ruangan_id, $master_jaringan->id_master_jaringan])}}"
                                            button class="btn btn-success">
                                            <i class="fas fa-clipboard-check"></i>
                                                Cek Aset Jaringan</button>
                                            </a>
                                            @else
                                            <a href="{{route('viewdetail.pengecekanjaringan', [$master_jaringan->jenis_aset->id_jenis_aset, $master_jaringan->ruangan_id, $master_jaringan->id_master_jaringan])}}"
                                             button type="button" data-toggle="tooltip" title=""
                                            button class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                                Details & Edit</button>
                                            </a>
                                            @endif
                                        @endif
                                        </div>
                                    </td>
                        </div>

                        </tbody>
                        @endforeach
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Input -->
<div class="modal fade" id="addJaringan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Aset Jaringan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store.jaringan')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Aset</label>
                        <select name="jenisselect" class="form-control" id="id_jenis_aset">
                            <option value="0">--Pilih Jenis Aset Jaringan--</option>
                            @foreach($jenis_asets as $jenis)
                            <option value="{{$jenis->id_jenis_aset}}">{{$jenis->nama_jenis_aset}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Aset Jaringan</label>
                        <input type="text" class="form-control" id="nama_master_jaringan" name="nama_master_jaringan"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Ruangan</label>
                        <select name="ruanganselect" class="form-control" id="id_ruangan">
                            @foreach($ruangan as $ruangann)
                            <option value="{{$ruangann->id_ruangan}}">{{$ruangann->nama_ruangan}}
                            </option>
                            @endforeach
                        </select>
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

<!-- Modal Update master jaringan -->
<div class="modal fade" id="editmasterjaringan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Aset Jaringan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.masterjaringan')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control" id="edit_id_master_jaringan" name="id_master_jaringan">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Aset</label>
                        <select name="jenisselect" class="form-control" id="edit_id_jenis_aset">
                            @foreach($jenis_asets as $jenis)
                            <option value="{{$jenis->id_jenis_aset}}">{{$jenis->nama_jenis_aset}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Aset Jaringan</label>
                        <input type="text" class="form-control" id="edit_nama_master_jaringan"
                            name="nama_master_jaringan" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Ruangan</label>
                        <select name="ruanganselect" class="form-control" id="edit_id_ruangan">
                            @foreach($ruangan as $ruangann)
                            <option value="{{$ruangann->id_ruangan}}">{{$ruangann->nama_ruangan}}
                            </option>
                            @endforeach
                        </select>
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
            var id_master_jaringan = $(this).data("id_master_jaringan");
            var jenis_aset_id = $(this).data("jenis_aset_id");
            var nama_master_jaringan = $(this).data("nama_master_jaringan");
            var ruangan_id = $(this).data("ruangan_id");


            $("#edit_id_master_jaringan").val(id_master_jaringan);
            $("#edit_nama_master_jaringan").val(nama_master_jaringan);



            console.log(jenis_aset_id);

            $("#edit_id_jenis_aset> option").each(function () {
                if (this.value == jenis_aset_id) {
                    $(this).attr("selected", "selected");
                }
            });

            $("#edit_id_ruangan > option").each(function () {
                if (this.value == ruangan_id) {
                    $(this).attr("selected", "selected");
                }
            });


        })
    })

</script>
@endsection
