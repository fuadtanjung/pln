@extends('layouts.template')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengaduan Kerusakan Aset Jaringan</h4>
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
                        <a href="/pengaduan/view">Pengaduan Kerusakan Aset Jaringan</a>
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
                            <a href="{{route('add.pengaduan_jaringan')}}" class="btn btn-info btn-lg btn-block"
                                    ><i class="fa fa-plus"></i> Tambah Pengaduan</button>
                                </a>
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No.Seri Aset</th>
                                            <th scope="col">Nama Aset</th>
                                            <th scope="col">Tgl Pengaduan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($detail_pengaduan_jaringan as $detail )

                                            <td scope="col">{{$loop->iteration }}</td>
                                            <td scope="col"></td>
                                            <td scope="col">{{$detail->master_aset_jaringan->nama_master_jaringan }}</td>
                                            <td scope="col">{{$detail->pengaduan_aset_jaringan->tgl_pengaduan }}</td>
                                            <td scope="col">
                                                @if ($detail->status_pengaduan=='Ditanggapi')
                                                <span class=" badge badge-info badge-lg">{{ ($detail->status_pengaduan)}}</span>
                                                @elseif ($detail->status_pengaduan=='Diajukan')
                                                <span class=" badge badge-warning">{{ ($detail->status_pengaduan)}}</span>
                                                @elseif ($detail->status_pengaduan=='Selesai')
                                                <span class="badge badge-success">{{ ($detail->status_pengaduan)}}</span></td>
                                                @endif
                                            </td>
                                            <th scope="col">
                                                <a href="{{ route('detailjaringan.pengaduan',$detail->id_pengaduan_jaringan) }}"
                                                    button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-lg" data-original-title="Detail Pengaduan">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </a>
                                            </th>
                                            <td scope="col">
                                                <a href=""
                                                    button type= "button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </a>

                                            </td>


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
