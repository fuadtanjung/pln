@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Inventarisasi Aset TI Pegawai</h4>
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
                        <a href="/asetti">Aset TI</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/asetti">Cek Aset</a>
                    </li>
        </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pengecekan Aset TI Pegawai</div>
                        </div>
                        <table id="basic-datatables" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Jenis Aset</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($master_aset_tis as $master)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$master->jenis_aset->nama_jenis_aset}}</td>
                                    <td>
                                        @if($master->jenis_aset->nama_jenis_aset=='Scanner' ||
                                        $master->jenis_aset->nama_jenis_aset=='Printer' )
                                        <button type="button" class="btn btn-info btn-check-aset" data-toggle="modal"
                                            data-target="#cek2" data-jenis_asset="{{ $master->jenis_aset_id }}"
                                            data-id_master="{{ $master->id_master_ti }}">
                                            <i class="fa fa-plus"></i>
                                            Cek Aset
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-info btn-check-aset" data-toggle="modal"
                                            data-target="#cek" data-jenis_asset="{{ $master->jenis_aset_id }}"
                                            data-id_master="{{$master->id_master_ti}}">
                                            <i class="fa fa-plus"></i>
                                            Cek Aset
                                        </button>
                                        @endif


                                    </td>
                                </tr>
                                <tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- TABEL PENGECEKAN ASET TI -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Rekap Pengecekan Aset TI</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No Seri</th>
                                        <th>Tanggal Pengecekan</th>
                                        <th>Nomor Induk Pegawai</th>
                                        <th>Nama Aset</th>
                                        <th>Tahun Aset</th>
                                        <th>Nama OS</th>
                                        <th>Lisensi OS</th>
                                        <th>Merek CPU</th>
                                        <th>Merek Monitor</th>
                                        <th>Kondisi Aset</th>
                                        <th>Status Aset</th>
                                        <th>Serial Number</th>
                                        <th>IP Adress</th>
                                        <th>MAC Address</th>
                                        <th>Kapasitas Memori</th>
                                        <th>Merek Processor</th>
                                        <th>Kapasitas Processor</th>
                                        <th>Tipe VGA</th>
                                        <th>Kapasitas VGA</th>
                                        <th>Kapasitas HDD</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detail_aset_tis as $detail)
                                    <tr>
                                        <td>{{$detail->no_seri }}</td>
                                        <td>{{$detail->tgl_pengecekan}}</td>
                                        <td>{{$detail->nip_pegawai}}</td>
                                        <td>{{$detail->master_aset_ti->nama_master_ti}}</td>
                                        <td>{{$detail->tahun_aset }}</td>
                                        <td>{{$detail->os->nama_os}}</td>
                                        <td>{{$detail->lisensi}}</td>
                                        <td>{{$detail->cpu_merek}}</td>
                                        <td>{{$detail->monitor_merek}}</td>
                                        <td>{{$detail->kondisi}}</td>
                                        <td>{{$detail->status}}</td>
                                        <td>{{$detail->serial_number}}</td>
                                        <td>{{$detail->ip_address}}</td>
                                        <td>{{$detail->mac_address}}</td>
                                        <td>{{$detail->kapasitas_memori}}</td>
                                        <td>{{$detail->processor_merek}}</td>
                                        <td>{{$detail->kapasitas_processor}}</td>
                                        <td>{{$detail->vga_tipe}}</td>
                                        <td>{{$detail->vga_kapasitas}} </td>
                                        <td>{{$detail->hdd_kapasitas}}</td>
                                        <td>

                                            <div class="form-button-action">
                                                <button type="button"
                                                    class="btn btn-link btn-primary btn-lg" data-original-title="Edit"
                                                    id="editButton" data-toggle="modal" data-target="#editAsetti"
                                                    data-no_seri="{{$detail->no_seri}}"
                                                    data-tgl_pengecekan="{{$detail->tgl_pengecekan}}"
                                                    data-nip_pegawai="{{$detail->nip_pegawai}}"
                                                    data-id_master_ti="{{$detail->id_master_ti}}"
                                                    data-nama_master_ti="{{$detail->master_aset_ti->nama_master_ti}}"
                                                    data-tahun_aset="{{$detail->tahun_aset}}"
                                                    data-os_id="{{$detail->os_id}}" data-lisensi="{{$detail->lisensi}}"
                                                    data-cpu_merek="{{$detail->cpu_merek}}"
                                                    data-monitor_merek="{{$detail->monitor_merek}}"
                                                    data-kondisi="{{$detail->kondisi}}"
                                                    data-status="{{$detail->status}}"
                                                    data-serial_number="{{$detail->serial_number}}"
                                                    data-ip_address="{{$detail->ip_address}}"
                                                    data-mac_address="{{$detail->mac_address}}"
                                                    data-kapasitas_memori="{{$detail->kapasitas_memori}}"
                                                    data-processor_merek="{{$detail->processor_merek}}"
                                                    data-kapasitas_processor="{{$detail->kapasitas_processor}}"
                                                    data-vga_tipe="{{$detail->vga_tipe}}"
                                                    data-vga_kapasitas="{{$detail->vga_kapasitas}}"
                                                    data-hdd_kapasitas="{{$detail->hdd_kapasitas}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <form action="{{route('delete.asetti', [$detail->no_seri]) }}" method="post"
                                                    onclick="return confirm('Anda yakin menghapus data ?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-link btn-danger btn-lg">
                                                    <i class="fa fa-trash"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach


                            </table>
                        </div>
                    </div>
                </div>
                <!-- TABEL PENGECEKAN ASET LAIN -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rekap Pengecekan Aset Lain</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No Seri</th>
                                                <th>Tanggal Pengecekan</th>
                                                <th>Nomor Induk Pegawai</th>
                                                <th>Nama Aset</th>
                                                <th>Tipe Aset</th>
                                                <th>Kondisi Aset</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($detail_aset_lains as $detail1)
                                            <tr>
                                                <td>{{$detail1->no_seri }}</td>
                                                <td>{{$detail1->tgl_pengecekan}}</td>
                                                <td>{{$detail1->nip_pegawai}}</td>
                                                <td>{{$detail1->master_aset_ti->nama_master_ti}}</td>
                                                <td>{{$detail1->tipe }}</td>
                                                <td>{{$detail1->kondisi}}</td>

                                                <td>

                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit" id="editButton2"
                                                            data-toggle="modal" data-target="#editAsetlain"
                                                            data-no_seri="{{$detail1->no_seri}}"
                                                            data-tgl_pengecekan="{{$detail1->tgl_pengecekan}}"
                                                            data-nip_pegawai="{{$detail1->nip_pegawai}}"
                                                            data-id_master_ti="{{$detail1->id_master_ti}}"
                                                            data-nama_master_ti="{{$detail1->master_aset_ti->nama_master_ti}}"
                                                            data-tipe="{{$detail1->tipe}}"
                                                            data-kondisi="{{$detail1->kondisi}}"
                                                        >
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                        <form action="{{route('delete.asetti', [$detail1->no_seri]) }}" method="post"
                                                        onclick="return confirm('Anda yakin menghapus data ?')"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-link btn-danger btn-lg">
                                                    <i class="fa fa-trash"></i>
                                                    </button>

                                                </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Cek Aset TI -->

                <div class="modal fade bd-example-modal-lg" id="cek" tabindex="1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <form action="{{route('store.detail_aset')}}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Pengecekan Aset TI</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-section">1. Data Aset</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="text">Nomor Seri Aset</label>
                                                <input type="text" readonly="readonly"
                                                    class="form-control no_seri_asset" id="no_seri" name="no_seri"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Tanggal Pengecekan</label>
                                                <input type="date" class="form-control" id="tgl_pengecekan"
                                                    value="{{date('Y-m-d')}}" name="tgl_pengecekan" required readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Nama Aset</label>
                                                <input type="text" class="form-control input_nama_asset"
                                                    id="nama_master_ti" name="nama_master_ti" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Nomor Induk Pegawai</label>

                                                <input type="text" class="form-control" id="nip_pegawai"
                                                    value="{{$nip_pegawai}}" name="nip_pegawai" required readonly>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Kondisi Aset</label>
                                                <select class="form-control" id="kondisi" name="kondisi" required>
                                                    <option value="">--Pilih Kondisi--</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Buruk">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Status Aset</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option>--Pilih Status--</option>
                                                    <option value="Sewa">Sewa</option>
                                                    <option value="Milik">Milik PLN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Tahun Aset</label>
                                                <select class="form-control" id="tahun_aset" name="tahun_aset" required>
                                                    <option value="0">--Pilih Tahun--</option>
                                                    <?php
                                                    $year = date('Y');
                                                    $min = $year - 60;
                                                        $max = $year;
                                                    for( $i=$max; $i>=$min; $i-- ) {
                                                    echo '<option value='.$i.'>'.$i.'</option>';
                                                }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <!-- <label for="email2">ID Master Aset</label> -->
                                                <input type="text" class="form-control input_id_asset" id="id_master_ti"
                                                    value="" name="id_master_ti" hidden>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-6 col-lg-4">
                                            <h5 class="text-section">2. Spesifikasi Aset</h5>
                                            <div class="form-group">
                                                <label for="email2">Merek CPU</label>
                                                <input type="text" class="form-control" id="cpu_merek" name="cpu_merek"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <br>
                                                <label for="email2">Merek Monitor</label>
                                                <input type="text" class="form-control" id="monitor_merek"
                                                    name="monitor_merek" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <br>
                                                <label for="email2">Serial Number</label>
                                                <input type="text" class="form-control" id="serial_number"
                                                    name="serial_number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Nama OS</label>
                                                <select class="form-control" id="os_id" name="os_id" required>

                                                    <option value="">--Pilih OS--</option>
                                                    @foreach($os as $o)
                                                    <option value="{{$o->id_os}}">{{$o->nama_os}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Lisensi OS</label>

                                                <select class="form-control" id="lisensi" name="lisensi" required>
                                                    <option value="">--Pilih Lisensi--</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">IP Address</label>
                                                <input type="text" class="form-control" id="ip_address"
                                                    name="ip_address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">MAC Address</label>
                                                <input type="text" class="form-control" id="mac_address"
                                                    name="mac_address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Tipe VGA</label>
                                                <input type="text" class="form-control" id="vga_tipe" name="vga_tipe"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Kapasitas VGA</label>
                                                <input type="text" class="form-control" id="vga_kapasitas"
                                                    name="vga_kapasitas" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Kapasitas Memori</label>
                                                <input type="text" class="form-control" id="kapasitas_memori"
                                                    name="kapasitas_memori" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Merek Processor</label>
                                                <input type="text" class="form-control" id="processor_merek"
                                                    name="processor_merek" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Kapasitas Processor</label>
                                                <input type="text" class="form-control" id="kapasitas_processor"
                                                    name="kapasitas_processor" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="email2">Kapasitas HDD</label>
                                                <input type="text" class="form-control" id="hdd_kapasitas"
                                                    name="hdd_kapasitas" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" value="modal1" name="modal">Save
                                            changes</button>
                                    </div>

                                </div>

                        </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Cek Aset Lain -->
                <div class="modal fade bd-example-modal-lg" id="cek2" tabindex="1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{route('store.detail_aset')}}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Cek Aset </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-section">Data Aset Lain</h5>
                                    <div class="row">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="text">Nomor Seri Aset</label>
                                                <input type="text" readonly="readonly"
                                                    class="form-control no_seri_asset_lain" id="no_seri" name="no_seri"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Tanggal Pengecekan</label>
                                                <input type="date" class="form-control" id="tgl_pengecekan"
                                                    value="{{date('Y-m-d')}}" name="tgl_pengecekan" required readonly>
                                            </div>
                                        </div>
                                                <input type="text" class="form-control input_id_asset" id="id_master_ti"
                                                    value="" name="id_master_ti" required readonly hidden>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Nama Aset</label>
                                                <input type="text" class="form-control input_nama_asset"
                                                    id="nama_master_ti" name="nama_master_ti" required readonly>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Nomor Induk Pegawai</label>
                                                <input type="text" class="form-control" id="nip_pegawai"
                                                    value="{{$nip_pegawai}}" name="nip_pegawai" required readonly>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Kondisi Aset</label>
                                                <select class="form-control" id="kondisi" name="kondisi" required>
                                                    <option value="0">--Pilih Kondisi--</option>
                                                    <option>Baik</option>
                                                    <option>Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Tipe Aset</label>
                                                <input type="text" class="form-control" id="tipe" name="tipe" required>
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

        <!-- MODAL UPDATE ASET TI -->
        <div class="modal fade bd-example-modal-lg" id="editAsetti" tabindex="1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg " role="document">
                <div class="modal-content">
                    <form action="{{route('update.asetti')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel"> Edit Data Pengecekan Aset TI</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="text-section">1. Data Aset</h5>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="text">Nomor Seri Aset</label>
                                        <input type="text" readonly="readonly" class="form-control no_seri_asset"
                                            id="edit_no_seri" name="no_seri"  required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Tanggal Pengecekan</label>
                                        <input type="date" class="form-control" id="edit_tgl_pengecekan"
                                            value="{{date('Y-m-d')}}" name="tgl_pengecekan" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <!-- <label for="email2">ID Master Aset</label> -->
                                        <input type="text" class="form-control input_id_asset" id="edit_id_master_ti"
                                            value="" name="id_master_ti" required readonly hidden>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Nama Aset</label>
                                        <input type="text" class="form-control input_nama_asset"
                                            id="edit_nama_master_ti" name="nama_master_ti" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Nomor Induk Pegawai</label>
                                        <input type="text" class="form-control" id="edit_nip_pegawai"
                                            value="{{$nip_pegawai}}" name="nip_pegawai" required readonly>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Kondisi Aset</label>
                                        <select class="form-control" id="edit_kondisi" name="kondisi" required>
                                            <option value="">--Pilih Kondisi--</option>
                                            <option value="Baik">Baik</option>
                                            <option value="Buruk">Buruk</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Status Aset</label>
                                        <select class="form-control" id="edit_status" name="status" required>
                                            <option>--Pilih Status--</option>
                                            <option value="Sewa">Sewa</option>
                                            <option value="Milik">Milik PLN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Tahun Aset</label>
                                        <select class="form-control" id="edit_tahun_aset" name="tahun_aset" required>
                                            <option value="0">--Pilih Tahun--</option>
                                            <?php
                                                    $year = date('Y');
                                                    $min = $year - 60;
                                                        $max = $year;
                                                    for( $i=$max; $i>=$min; $i-- ) {
                                                    echo '<option value='.$i.'>'.$i.'</option>';
                                                }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control" id="edit_status" name="status" hidden>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <h5 class="text-section">2. Spesifikasi Aset</h5>
                                    <div class="form-group">
                                        <label for="email2">Merek CPU</label>
                                        <input type="text" class="form-control" id="edit_cpu_merek" name="cpu_merek"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <br>
                                        <label for="email2">Merek Monitor</label>
                                        <input type="text" class="form-control" id="edit_monitor_merek"
                                            name="monitor_merek" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <br>
                                        <label for="email2">Serial Number</label>
                                        <input type="text" class="form-control" id="edit_serial_number"
                                            name="serial_number" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Nama OS</label>
                                        <select class="form-control" id="edit_os_id" name="os_id" required>

                                            <option value="">--Pilih OS--</option>
                                            @foreach($os as $o)
                                            <option value="{{$o->id_os}}">{{$o->nama_os}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Lisensi OS</label>

                                        <select class="form-control" id="edit_lisensi" name="lisensi" required>
                                            <option value="">--Pilih Lisensi--</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">IP Address</label>
                                        <input type="text" class="form-control" id="edit_ip_address" name="ip_address"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">MAC Address</label>
                                        <input type="text" class="form-control" id="edit_mac_address" name="mac_address"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Tipe VGA</label>
                                        <input type="text" class="form-control" id="edit_vga_tipe" name="vga_tipe"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Kapasitas VGA</label>
                                        <input type="text" class="form-control" id="edit_vga_kapasitas"
                                            name="vga_kapasitas" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Kapasitas Memori</label>
                                        <input type="text" class="form-control" id="edit_kapasitas_memori"
                                            name="kapasitas_memori" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Merek Processor</label>
                                        <input type="text" class="form-control" id="edit_processor_merek"
                                            name="processor_merek" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Kapasitas Processor</label>
                                        <input type="text" class="form-control" id="edit_kapasitas_processor"
                                            name="kapasitas_processor" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Kapasitas HDD</label>
                                        <input type="text" class="form-control" id="edit_hdd_kapasitas"
                                            name="hdd_kapasitas" required>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="modal" value="modal1">Save changes</button>
                            </div>
                    </form>

                </div>

            </div>

        </div>

        <!-- MODAL UPDATE ASET LAIN -->
        <div class="modal fade bd-example-modal-lg" id="editAsetlain" tabindex="1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{route('update.asetti')}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Edit Data Pengecekan Aset Lain </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-section">Data Aset Lain</h5>
                                    <div class="row">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="text">Nomor Seri Aset</label>
                                                <input type="text" readonly="readonly"
                                                    class="form-control no_seri_asset_lain" id="edit_no_seri" name="no_seri"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Tanggal Pengecekan</label>
                                                <input type="date" class="form-control edit_tgl_pengecekan_lain" id="edit_tgl_pengecekan"
                                                    value="" name="tgl_pengecekan" required readonly>
                                            </div>
                                        </div>

                                        <input type="text" class="form-control input_id_asset_lain" id="edit_id_master_ti"
                                        value="" name="id_master_ti" required readonly hidden>


                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Nama Aset</label>
                                                <input type="text" class="form-control input_nama_asset"
                                                    id="edit_nama_master_ti_lain" name="nama_master_ti" required readonly>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Nomor Induk Pegawai</label>
                                                <input type="text" class="form-control" id="edit_nip_pegawai"
                                                    value="{{$nip_pegawai}}" name="nip_pegawai" required readonly>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Kondisi Aset</label>
                                                <select class="form-control" id="edit_kondisi_lain" name="kondisi" required>
                                                    <option value="0">--Pilih Kondisi--</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Buruk">Buruk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email2">Tipe Aset</label>
                                                <input type="text" class="form-control" id="edit_tipe" name="tipe" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="modal" value="modal2">Save Changes</button>
                                    </div>

                                </div>

                        </div>
                        </form>
                    </div>
        </div>

        @endsection

        @section('javascript')
        <script>
            $(document).ready(function () {
                $(document).on("click", "#editButton", function () {
                    var no_seri = $(this).data("no_seri");
                    var tgl_pengecekan = $(this).data("tgl_pengecekan");
                    var nip_pegawai = $(this).data("nip_pegawai");
                    var id_master_ti = $(this).data("id_master_ti");
                    var nama_master_ti = $(this).data("nama_master_ti");
                    var tahun_aset = $(this).data("tahun_aset");
                    var os_id = $(this).data("os_id");
                    var lisensi = $(this).data("lisensi");
                    var cpu_merek = $(this).data("cpu_merek");
                    var monitor_merek = $(this).data("monitor_merek");
                    var kondisi = $(this).data("kondisi");
                    var status = $(this).data("status");
                    var serial_number = $(this).data("serial_number");
                    var ip_address = $(this).data("ip_address");
                    var mac_address = $(this).data("mac_address");
                    var kapasitas_memori = $(this).data("kapasitas_memori");
                    var processor_merek = $(this).data("processor_merek");
                    var kapasitas_processor = $(this).data("kapasitas_processor");
                    var vga_tipe = $(this).data("vga_tipe");
                    var vga_kapasitas = $(this).data("vga_kapasitas");
                    var hdd_kapasitas = $(this).data("hdd_kapasitas");

                    $("#edit_no_seri").val(no_seri);
                    $("#edit_tgl_pengecekan").val(tgl_pengecekan);
                    $("#edit_nip_pegawai").val(nip_pegawai);
                    $("#edit_nama_master_ti").val(nama_master_ti);
                    $("#edit_id_master_ti").val(id_master_ti);
                    $("#edit_tahun_aset").val(tahun_aset);
                    $("#edit_os_id").val(os_id);
                    $("#edit_lisensi").val(lisensi);
                    $("#edit_cpu_merek").val(cpu_merek);
                    $("#edit_monitor_merek").val(monitor_merek);
                    $("#edit_kondisi").val(kondisi);
                    $("#edit_status").val(status);
                    $("#edit_serial_number").val(serial_number);
                    $("#edit_ip_address").val(ip_address);
                    $("#edit_mac_address").val(mac_address);
                    $("#edit_kapasitas_memori").val(kapasitas_memori);
                    $("#edit_processor_merek").val(processor_merek);
                    $("#edit_kapasitas_processor").val(kapasitas_processor);
                    $("#edit_vga_tipe").val(vga_tipe);
                    $("#edit_vga_kapasitas").val(vga_kapasitas);
                    $("#edit_hdd_kapasitas").val(hdd_kapasitas);

                    console.log(no_seri);


                })
            })
            $(document).ready(function () {
                $(document).on("click", "#editButton2", function () {
                    var no_seri = $(this).data("no_seri");
                    var tgl_pengecekan = $(this).data("tgl_pengecekan");
                    var nip_pegawai = $(this).data("nip_pegawai");
                    var id_master_ti = $(this).data("id_master_ti");
                    var nama_master_ti = $(this).data("nama_master_ti");
                    var tipe = $(this).data("tipe");
                    var kondisi = $(this).data("kondisi");


                    $("#edit_kondisi_lain > option").each(function(i, opt){
                        if(this.value == kondisi)
                        {
                            $(opt).attr("selected","selected");
                        }
                    });

                    $(".no_seri_asset_lain").val(no_seri);
                    $(".edit_tgl_pengecekan_lain").val(tgl_pengecekan);
                    $("#edit_nip_pegawai").val(nip_pegawai);
                    $(".input_id_asset_lain").val(id_master_ti);
                    $("#edit_nama_master_ti_lain").val(nama_master_ti);
                    $("#edit_tipe").val(tipe);
                    $("#edit_kondisi").val(kondisi);

                })
            })

        </script>
        @endsection
