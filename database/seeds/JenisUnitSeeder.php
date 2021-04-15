<?php

use Illuminate\Database\Seeder;

class JenisUnitSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('jenis_units')->insert([
        'id_jenis_unit'=>1,    
        'nama_jenis_unit'=>'Unit Induk',
        ]);
        DB::table('jenis_units')->insert([
        'id_jenis_unit'=>2,
        'nama_jenis_unit'=>'Unit Layanan Pelanggan',
         ]);

        DB::table('jenis_units')->insert([
        'id_jenis_unit'=>3,
        'nama_jenis_unit'=>'Kantor Pelayanan',
        ]);
    }
}
