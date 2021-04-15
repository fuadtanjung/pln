@extends('layouts.template')

@section('content')
<style>
.label {
  color: white;
  padding: 2px;
}

.success {background-color: #4CAF50;} /* Green */
.danger {background-color: #f44336;} /* Red */
.warning {background-color: #ff9800;} /* Orange */

</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengaduan Kerusakan Aset TI</h4>
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
                        <a href="/pengaduan">Pengaduan Kerusakan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/pengaduan/view">Pengaduan Kerusakan Aset tI</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pengaduan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="{{route('add.pengaduan_ti')}}" class="btn btn-info btn-lg btn-block"><i
                                        class="fa fa-plus"></i> Tambah Pengaduan</button>
                                </a>
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No.Seri Aset</th>
                                            <th scope="col">Nama Aset</th>
                                            <th scope="col">Tgl Pengaduan</th>
                                            <th scope="col">Detail Pengaduan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($detail_pengaduan_ti as $detail )
                                            <td>{{$loop->iteration}}</td>
                                            <td></td>
                                            <td>{{$detail->master_aset_ti->nama_master_ti}}</td>
                                            <td>{{$detail->pengaduan_aset_ti->tgl_pengaduan}}</td>
                                            <td>
                                                <a href="{{route('detailti.pengaduan',$detail->id_pengaduan_ti )}}"
                                                button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-lg" data-original-title="Detail Pengaduan">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                </a>
                                            </td>
                                            <td>
                                                @if ($detail->status_pengaduan=='Ditanggapi')
                                                <span class=" badge badge-info badge-lg">{{ ($detail->status_pengaduan)}}</span>
                                                @elseif ($detail->status_pengaduan=='Diajukan')
                                                <span class=" badge badge-warning">{{ ($detail->status_pengaduan)}}</span>
                                                @elseif ($detail->status_pengaduan=='Selesai')
                                                <span class="badge badge-success">{{ ($detail->status_pengaduan)}}</span></td>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('viewupdate.pengaduan_ti', $detail->id_pengaduan_ti) }}"
                                                    button type= "button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </a>

                                            </td>
                                            <td></td>




                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>

                            </div>
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
</div>


@endsection
