<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
   
    public function run()
    {
       DB::table('units')->insert([
        'id_unit'=>'U-'. rand(0,999),
        'jenis_id'=>1,
        'nama_unit'=>'Unit Induk Wilayah Sumatera Barat',
        'alamat_unit'=>'Jl.Dr Wahidin no.8 Sawahan'
       ]);

       DB::table('units')->insert([
        'id_unit'=>'U-'. rand(0,999),
        'jenis_id'=>1,
        'nama_unit'=>'UP3 Padang',
        'alamat_unit'=>'Jl. S.Parman No.221, Ulak Karang Utara',
       ]);

       
    }
}
