@if(auth()->user()->role->nama_role =="Pegawai")
@include('layouts.menu.pegawai')
@endif

@if(auth()->user()->role->nama_role =="Petugas")
@include('layouts.menu.petugas')
@endif