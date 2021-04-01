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
            	['id_kelurahan' => 1201060015, 'nama' => "01"],
            	['id_kelurahan' => 1201060015, 'nama' => "02"],
            	['id_kelurahan' => 1201060015, 'nama' => "03"],
            	['id_kelurahan' => 1201060015, 'nama' => "04"],
            	['id_kelurahan' => 1201060015, 'nama' => "05"],
            	['id_kelurahan' => 1201060015, 'nama' => "06"],
            	['id_kelurahan' => 1201060015, 'nama' => "07"],
            	['id_kelurahan' => 1201060015, 'nama' => "08"],
            	['id_kelurahan' => 1201060015, 'nama' => "16"],
            	['id_kelurahan' => 1201060015, 'nama' => "11"],
            	['id_kelurahan' => 1201060015, 'nama' => "15"],
            	['id_kelurahan' => 1201060015, 'nama' => "12"],
            	['id_kelurahan' => 1201060015, 'nama' => "13"],
            	['id_kelurahan' => 1201060015, 'nama' => "14"],
                ['id_kelurahan' => 1201060016, 'nama' => "01"],
            	['id_kelurahan' => 1201060016, 'nama' => "02"],
            	['id_kelurahan' => 1201060016, 'nama' => "03"],
            	['id_kelurahan' => 1201060016, 'nama' => "04"],
            	['id_kelurahan' => 1201060016, 'nama' => "05"],
            	['id_kelurahan' => 1201060016, 'nama' => "06"],
            	['id_kelurahan' => 1201060016, 'nama' => "07"],
            	['id_kelurahan' => 1201060016, 'nama' => "08"],
            	['id_kelurahan' => 1201060016, 'nama' => "16"],
            	['id_kelurahan' => 1201060016, 'nama' => "11"],
            	['id_kelurahan' => 1201060016, 'nama' => "15"],
            	['id_kelurahan' => 1201060016, 'nama' => "12"],
            	['id_kelurahan' => 1201060016, 'nama' => "13"],
            	['id_kelurahan' => 1201060016, 'nama' => "14"],
            	['id_kelurahan' => 1301011002, 'nama' => "01"],
            	['id_kelurahan' => 1301011002, 'nama' => "02"],
            	['id_kelurahan' => 1301011002, 'nama' => "03"],
            	['id_kelurahan' => 1301011002, 'nama' => "04"],
            	['id_kelurahan' => 1301011002, 'nama' => "05"],
            	['id_kelurahan' => 1301011002, 'nama' => "06"],
            	['id_kelurahan' => 1301011002, 'nama' => "07"],
            	['id_kelurahan' => 1301011002, 'nama' => "08"],
            	['id_kelurahan' => 1301011002, 'nama' => "16"],
            	['id_kelurahan' => 1301011002, 'nama' => "11"],
            	['id_kelurahan' => 1301011002, 'nama' => "15"],
            	['id_kelurahan' => 1301011002, 'nama' => "12"],
            	['id_kelurahan' => 1301011002, 'nama' => "13"],
            	['id_kelurahan' => 1301011002, 'nama' => "14"],
				['id_kelurahan' => 1401010005, 'nama' => "01"],
            	['id_kelurahan' => 1401010005, 'nama' => "02"],
            	['id_kelurahan' => 1401010005, 'nama' => "03"],
            	['id_kelurahan' => 1401010005, 'nama' => "04"],
            	['id_kelurahan' => 1401010005, 'nama' => "05"],
            	['id_kelurahan' => 1401010005, 'nama' => "06"],
            	['id_kelurahan' => 1401010005, 'nama' => "07"],
            	['id_kelurahan' => 1401010005, 'nama' => "08"],
            	['id_kelurahan' => 1401010005, 'nama' => "16"],
            	['id_kelurahan' => 1401010005, 'nama' => "11"],
            	['id_kelurahan' => 1401010005, 'nama' => "15"],
            	['id_kelurahan' => 1401010005, 'nama' => "12"],
            	['id_kelurahan' => 1401010005, 'nama' => "13"],
            	['id_kelurahan' => 1401010005, 'nama' => "14"],
            	['id_kelurahan' => 1501010001, 'nama' => "01"],
            	['id_kelurahan' => 1501010001, 'nama' => "02"],
            	['id_kelurahan' => 1501010001, 'nama' => "03"],
            	['id_kelurahan' => 1501010001, 'nama' => "04"],
            	['id_kelurahan' => 1501010001, 'nama' => "05"],
            	['id_kelurahan' => 1501010001, 'nama' => "06"],
            	['id_kelurahan' => 1501010001, 'nama' => "07"],
            	['id_kelurahan' => 1501010001, 'nama' => "08"],
            	['id_kelurahan' => 1501010001, 'nama' => "16"],
            	['id_kelurahan' => 1501010001, 'nama' => "11"],
            	['id_kelurahan' => 1501010001, 'nama' => "15"],
            	['id_kelurahan' => 1501010001, 'nama' => "12"],
            	['id_kelurahan' => 1501010001, 'nama' => "13"],
            	['id_kelurahan' => 1501010001, 'nama' => "14"],
                ['id_kelurahan' => 1601052001, 'nama' => "01"],
            	['id_kelurahan' => 1601052001, 'nama' => "02"],
            	['id_kelurahan' => 1601052001, 'nama' => "03"],
            	['id_kelurahan' => 1601052001, 'nama' => "04"],
            	['id_kelurahan' => 1601052001, 'nama' => "05"],
            	['id_kelurahan' => 1601052001, 'nama' => "06"],
            	['id_kelurahan' => 1601052001, 'nama' => "07"],
            	['id_kelurahan' => 1601052001, 'nama' => "08"],
            	['id_kelurahan' => 1601052001, 'nama' => "16"],
            	['id_kelurahan' => 1601052001, 'nama' => "11"],
            	['id_kelurahan' => 1601052001, 'nama' => "15"],
            	['id_kelurahan' => 1601052001, 'nama' => "12"],
            	['id_kelurahan' => 1601052001, 'nama' => "13"],
            	['id_kelurahan' => 1601052001, 'nama' => "14"],
				['id_kelurahan' => 1701040002, 'nama' => "01"],
            	['id_kelurahan' => 1701040002, 'nama' => "02"],
            	['id_kelurahan' => 1701040002, 'nama' => "03"],
            	['id_kelurahan' => 1701040002, 'nama' => "04"],
            	['id_kelurahan' => 1701040002, 'nama' => "05"],
            	['id_kelurahan' => 1701040002, 'nama' => "06"],
            	['id_kelurahan' => 1701040002, 'nama' => "07"],
            	['id_kelurahan' => 1701040002, 'nama' => "08"],
            	['id_kelurahan' => 1701040002, 'nama' => "16"],
            	['id_kelurahan' => 1701040002, 'nama' => "11"],
            	['id_kelurahan' => 1701040002, 'nama' => "15"],
            	['id_kelurahan' => 1701040002, 'nama' => "12"],
            	['id_kelurahan' => 1701040002, 'nama' => "13"],
            	['id_kelurahan' => 1701040002, 'nama' => "14"],
            	['id_kelurahan' => 1801040001, 'nama' => "01"],
            	['id_kelurahan' => 1801040001, 'nama' => "02"],
            	['id_kelurahan' => 1801040001, 'nama' => "03"],
            	['id_kelurahan' => 1801040001, 'nama' => "04"],
            	['id_kelurahan' => 1801040001, 'nama' => "05"],
            	['id_kelurahan' => 1801040001, 'nama' => "06"],
            	['id_kelurahan' => 1801040001, 'nama' => "07"],
            	['id_kelurahan' => 1801040001, 'nama' => "08"],
            	['id_kelurahan' => 1801040001, 'nama' => "16"],
            	['id_kelurahan' => 1801040001, 'nama' => "11"],
            	['id_kelurahan' => 1801040001, 'nama' => "15"],
            	['id_kelurahan' => 1801040001, 'nama' => "12"],
            	['id_kelurahan' => 1801040001, 'nama' => "13"],
            	['id_kelurahan' => 1801040001, 'nama' => "14"],
                ['id_kelurahan' => 1901070001, 'nama' => "01"],
            	['id_kelurahan' => 1901070001, 'nama' => "02"],
            	['id_kelurahan' => 1901070001, 'nama' => "03"],
            	['id_kelurahan' => 1901070001, 'nama' => "04"],
            	['id_kelurahan' => 1901070001, 'nama' => "05"],
            	['id_kelurahan' => 1901070001, 'nama' => "06"],
            	['id_kelurahan' => 1901070001, 'nama' => "07"],
            	['id_kelurahan' => 1901070001, 'nama' => "08"],
            	['id_kelurahan' => 1901070001, 'nama' => "16"],
            	['id_kelurahan' => 1901070001, 'nama' => "11"],
            	['id_kelurahan' => 1901070001, 'nama' => "15"],
            	['id_kelurahan' => 1901070001, 'nama' => "12"],
            	['id_kelurahan' => 1901070001, 'nama' => "13"],
            	['id_kelurahan' => 1901070001, 'nama' => "14"],
				['id_kelurahan' => 2101010003, 'nama' => "01"],
            	['id_kelurahan' => 2101010003, 'nama' => "02"],
            	['id_kelurahan' => 2101010003, 'nama' => "03"],
            	['id_kelurahan' => 2101010003, 'nama' => "04"],
            	['id_kelurahan' => 2101010003, 'nama' => "05"],
            	['id_kelurahan' => 2101010003, 'nama' => "06"],
            	['id_kelurahan' => 2101010003, 'nama' => "07"],
            	['id_kelurahan' => 2101010003, 'nama' => "08"],
            	['id_kelurahan' => 2101010003, 'nama' => "16"],
            	['id_kelurahan' => 2101010003, 'nama' => "11"],
            	['id_kelurahan' => 2101010003, 'nama' => "15"],
            	['id_kelurahan' => 2101010003, 'nama' => "12"],
            	['id_kelurahan' => 2101010003, 'nama' => "13"],
            	['id_kelurahan' => 2101010003, 'nama' => "14"],
            	['id_kelurahan' => 3101010001, 'nama' => "01"],
            	['id_kelurahan' => 3101010001, 'nama' => "02"],
            	['id_kelurahan' => 3101010001, 'nama' => "03"],
            	['id_kelurahan' => 3101010001, 'nama' => "04"],
            	['id_kelurahan' => 3101010001, 'nama' => "05"],
            	['id_kelurahan' => 3101010001, 'nama' => "06"],
            	['id_kelurahan' => 3101010001, 'nama' => "07"],
            	['id_kelurahan' => 3101010001, 'nama' => "08"],
            	['id_kelurahan' => 3101010001, 'nama' => "16"],
            	['id_kelurahan' => 3101010001, 'nama' => "11"],
            	['id_kelurahan' => 3101010001, 'nama' => "15"],
            	['id_kelurahan' => 3101010001, 'nama' => "12"],
            	['id_kelurahan' => 3101010001, 'nama' => "13"],
            	['id_kelurahan' => 3101010001, 'nama' => "14"],
                ['id_kelurahan' => 3204260003, 'nama' => "01"],
            	['id_kelurahan' => 3204260003, 'nama' => "02"],
            	['id_kelurahan' => 3204260003, 'nama' => "03"],
            	['id_kelurahan' => 3204260003, 'nama' => "04"],
            	['id_kelurahan' => 3204260003, 'nama' => "05"],
            	['id_kelurahan' => 3204260003, 'nama' => "06"],
            	['id_kelurahan' => 3204260003, 'nama' => "07"],
            	['id_kelurahan' => 3204260003, 'nama' => "08"],
            	['id_kelurahan' => 3204260003, 'nama' => "16"],
            	['id_kelurahan' => 3204260003, 'nama' => "11"],
            	['id_kelurahan' => 3204260003, 'nama' => "15"],
            	['id_kelurahan' => 3204260003, 'nama' => "12"],
            	['id_kelurahan' => 3204260003, 'nama' => "13"],
            	['id_kelurahan' => 3204260003, 'nama' => "14"],
            	['id_kelurahan' => 3204250005, 'nama' => "01"],
            	['id_kelurahan' => 3204250005, 'nama' => "02"],
            	['id_kelurahan' => 3204250005, 'nama' => "03"],
            	['id_kelurahan' => 3204250005, 'nama' => "04"],
            	['id_kelurahan' => 3204250005, 'nama' => "05"],
            	['id_kelurahan' => 3204250005, 'nama' => "06"],
            	['id_kelurahan' => 3204250005, 'nama' => "07"],
            	['id_kelurahan' => 3204250005, 'nama' => "08"],
            	['id_kelurahan' => 3204250005, 'nama' => "16"],
            	['id_kelurahan' => 3204250005, 'nama' => "11"],
            	['id_kelurahan' => 3204250005, 'nama' => "15"],
            	['id_kelurahan' => 3204250005, 'nama' => "12"],
            	['id_kelurahan' => 3204250005, 'nama' => "13"],
            	['id_kelurahan' => 3204250005, 'nama' => "14"],
                ['id_kelurahan' => 3204270001, 'nama' => "01"],
            	['id_kelurahan' => 3204270001, 'nama' => "02"],
            	['id_kelurahan' => 3204270001, 'nama' => "03"],
            	['id_kelurahan' => 3204270001, 'nama' => "04"],
            	['id_kelurahan' => 3204270001, 'nama' => "05"],
            	['id_kelurahan' => 3204270001, 'nama' => "06"],
            	['id_kelurahan' => 3204270001, 'nama' => "07"],
            	['id_kelurahan' => 3204270001, 'nama' => "08"],
            	['id_kelurahan' => 3204270001, 'nama' => "16"],
            	['id_kelurahan' => 3204270001, 'nama' => "11"],
            	['id_kelurahan' => 3204270001, 'nama' => "15"],
            	['id_kelurahan' => 3204270001, 'nama' => "12"],
            	['id_kelurahan' => 3204270001, 'nama' => "13"],
            	['id_kelurahan' => 3204270001, 'nama' => "14"],
            	['id_kelurahan' => 3303130007, 'nama' => "01"],
            	['id_kelurahan' => 3303130007, 'nama' => "02"],
            	['id_kelurahan' => 3303130007, 'nama' => "03"],
            	['id_kelurahan' => 3303130007, 'nama' => "04"],
            	['id_kelurahan' => 3303130007, 'nama' => "05"],
            	['id_kelurahan' => 3303130007, 'nama' => "06"],
            	['id_kelurahan' => 3303130007, 'nama' => "07"],
            	['id_kelurahan' => 3303130007, 'nama' => "08"],
            	['id_kelurahan' => 3303130007, 'nama' => "16"],
            	['id_kelurahan' => 3303130007, 'nama' => "11"],
            	['id_kelurahan' => 3303130007, 'nama' => "15"],
            	['id_kelurahan' => 3303130007, 'nama' => "12"],
            	['id_kelurahan' => 3303130007, 'nama' => "13"],
            	['id_kelurahan' => 3303130007, 'nama' => "14"],
                ['id_kelurahan' => 3303090007, 'nama' => "01"],
            	['id_kelurahan' => 3303090007, 'nama' => "02"],
            	['id_kelurahan' => 3303090007, 'nama' => "03"],
            	['id_kelurahan' => 3303090007, 'nama' => "04"],
            	['id_kelurahan' => 3303090007, 'nama' => "05"],
            	['id_kelurahan' => 3303090007, 'nama' => "06"],
            	['id_kelurahan' => 3303090007, 'nama' => "07"],
            	['id_kelurahan' => 3303090007, 'nama' => "08"],
            	['id_kelurahan' => 3303090007, 'nama' => "16"],
            	['id_kelurahan' => 3303090007, 'nama' => "11"],
            	['id_kelurahan' => 3303090007, 'nama' => "15"],
            	['id_kelurahan' => 3303090007, 'nama' => "12"],
            	['id_kelurahan' => 3303090007, 'nama' => "13"],
            	['id_kelurahan' => 3303090007, 'nama' => "14"],
            	['id_kelurahan' => 3401010001, 'nama' => "01"],
            	['id_kelurahan' => 3401010001, 'nama' => "02"],
            	['id_kelurahan' => 3401010001, 'nama' => "03"],
            	['id_kelurahan' => 3401010001, 'nama' => "04"],
            	['id_kelurahan' => 3401010001, 'nama' => "05"],
            	['id_kelurahan' => 3401010001, 'nama' => "06"],
            	['id_kelurahan' => 3401010001, 'nama' => "07"],
            	['id_kelurahan' => 3401010001, 'nama' => "08"],
            	['id_kelurahan' => 3401010001, 'nama' => "16"],
            	['id_kelurahan' => 3401010001, 'nama' => "11"],
            	['id_kelurahan' => 3401010001, 'nama' => "15"],
            	['id_kelurahan' => 3401010001, 'nama' => "12"],
            	['id_kelurahan' => 3401010001, 'nama' => "13"],
            	['id_kelurahan' => 3401010001, 'nama' => "14"],
                
            ];
            DB::table('rws')->insert($rws);
    }
}
