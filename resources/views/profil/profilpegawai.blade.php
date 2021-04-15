@extends('layouts.template')

@section('content')
<div class="section-body">
    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Profil Pegawai</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-lg-4">
                                    <div class="form-group" id="addUnit">
                                        <form action="{{route('store.profil')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nomor Induk Pegawai</label>
                                                <input type="text" class="form-control" id="nip_pegawai"
                                                    name="nip_pegawai" value={{auth()->user()->nip}} required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama</label>
                                                <input type="nama" class="form-control" id="nama_pegawai"
                                                    name="nama_pegawai" value={{auth()->user()->username}} required
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Email</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                    name="email" value={{auth()->user()->email}} required disabled>
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jabatan</label>
                                            <select name="jabatan_id" class="form-control" id="id_jabatan">
                                                @foreach($jabatans as $jabatan)
                                                <option value="{{$jabatan->id_jabatan}}">{{$jabatan->nama_jabatan}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Nama Unit</label>
                                            <select name="unit_id" class="form-control" id="id_unit">
                                                @foreach($units as $unit)
                                                <option value="{{$unit->id_unit}}">{{$unit->nama_unit}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Alamat</label>
                                            <input type="text" class="form-control" id="alamat_pegawai"
                                                name="alamat_pegawai" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">No.Hp</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                        </div>
                                        <button type="submit" href = "{{ route('view.profil') }}" class="btn btn-info" data-toggle="modal"
                                            data-target="#addProfil">Tambah </button>

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


    @endsection
