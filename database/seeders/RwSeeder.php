<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rws = [
                ['id_kelurahan' => 1101010001, 'nama' => "01"],
            	['id_kelurahan' => 1101010001, 'nama' => "02"],
            	['id_kelurahan' => 1101010001, 'nama' => "03"],
            	['id_kelurahan' => 1101010001, 'nama' => "04"],
            	['id_kelurahan' => 1101010001, 'nama' => "05"],
            	['id_kelurahan' => 1101010001, 'nama' => "06"],
            	['id_kelurahan' => 1101010001, 'nama' => "07"],
            	['id_kelurahan' => 1101010001, 'nama' => "08"],
            	['id_kelurahan' => 1101010001, 'nama' => "16"],
            	['id_kelurahan' => 1101010001, 'nama' => "11"],
            	['id_kelurahan' => 1101010001, 'nama' => "15"],
            	['id_kelurahan' => 1101010001, 'nama' => "12"],
            	['id_kelurahan' => 1101010001, 'nama' => "13"],
            	['id_kelurahan' => 1101010001, 'nama' => "14"],
            	['id_kelurahan' => 1101010002, 'nama' => "01"],
            	['id_kelurahan' => 1101010002, 'nama' => "02"],
            	['id_kelurahan' => 1101010002, 'nama' => "03"],
            	['id_kelurahan' => 1101010002, 'nama' => "04"],
            	['id_kelurahan' => 1101010002, 'nama' => "05"],
            	['id_kelurahan' => 1101010002, 'nama' => "06"],
            	['id_kelurahan' => 1101010002, 'nama' => "07"],
            	['id_kelurahan' => 1101010002, 'nama' => "08"],
            	['id_kelurahan' => 1101010002, 'nama' => "16"],
            	['id_kelurahan' => 1101010002, 'nama' => "11"],
            	['id_kelurahan' => 1101010002, 'nama' => "15"],
            	['id_kelurahan' => 1101010002, 'nama' => "12"],
            	['id_kelurahan' => 1101010002, 'nama' => "13"],
            	['id_kelurahan' => 1101010002, 'nama' => "14"],
                ['id_kelurahan' => 1101010003, 'nama' => "01"],
            	['id_kelurahan' => 1101010003, 'nama' => "02"],
            	['id_kelurahan' => 1101010003, 'nama' => "03"],
            	['id_kelurahan' => 1101010003, 'nama' => "04"],
            	['id_kelurahan' => 1101010003, 'nama' => "05"],
            	['id_kelurahan' => 1101010003, 'nama' => "06"],
            	['id_kelurahan' => 1101010003, 'nama' => "07"],
            	['id_kelurahan' => 1101010003, 'nama' => "08"],
            	['id_kelurahan' => 1101010003, 'nama' => "16"],
            	['id_kelurahan' => 1101010003, 'nama' => "11"],
            	['id_kelurahan' => 1101010003, 'nama' => "15"],
            	['id_kelurahan' => 1101010003, 'nama' => "12"],
            	['id_kelurahan' => 1101010003, 'nama' => "13"],
            	['id_kelurahan' => 1101010003, 'nama' => "14"],
                
            ];
            DB::table('rws')->insert($rws);
    }
}
