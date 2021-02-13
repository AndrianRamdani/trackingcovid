<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\Tracking;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data = [];
    public function global()
    {
        $response = Http::get('https://api.kawalcorona.com')->json();
        foreach ($response as $data => $val) {
            $raw = $val ['attributes' ];
            $res = ['Negara' => $raw['Country_Region'],
                    'Positif' => $raw['Confirmed'],
                    'Sembuh' => $raw['Recovered'],
                    'Meninggal' => $raw['Deaths'],

                   /* 'OBJECTID' => $raw['OBJECTID'],
                    'Country_Region' => $raw['Country_Region'],
                    'Last_Update' => $raw['Last_Update'],
                    'Lat' => $raw['Lat'],
                    'Long_' => $raw['Long_'],
                    'Confirmed' => $raw['Confirmed'],
                    'Deaths' => $raw['Deaths'],
                    'Recovered' => $raw['Recovered'],
                    'Active' => $raw['Active']*/
            ];

            array_push ($this->data, $res);
        }
            $data = [
                'success' => true,
                'Data Global' => $this->data,
                'message' => 'Berhasil'
            ];

            return response()->json($data, 200);
    }
    // public function global()
    // {
    //     // DATA GLOBAL MENGGUNAKAN HTTP CLIENT
    //     $url =  Http::get('https://api.kawalcorona.com/')->json();
    //     $data = [];
    //     foreach($url as $key => $isi)
    //     {
    //         $dataarray = $isi['attributes'];
    //         $isidata = [
    //             'OBJECTID' => $dataarray['OBJECTID'],
    //             'Country_Region' => $dataarray['Country_Region'],
    //             'Confirmed' => $dataarray['Confirmed'],
    //             'Deaths' => $dataarray['Deaths'],
    //             'Recovered' => $dataarray['Recovered'] 
    //         ];
    //         array_push($data, $isidata);
    //     }

    //     $hasil = [
    //         'success' => true,
    //         'data' => $data,
    //         'message' => 'Success'
    //     ];

    // 	return response()->json($hasil, 200);
    // }
    public function indonesia()
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('trackings')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->select(
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->get();

        $data = DB::table('trackings')
                ->select(
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Data' => 'Data Kasus Indonesia',
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function hari(){
        //Data Perhari
        $tracking = Tracking::get('created_at')->last();
        $jumlah_positif = Tracking::where('tanggal', date('Y-m-d'))->sum('jumlah_positif');
        $jumlah_sembuh = Tracking::where('tanggal', date('Y-m-d'))->sum('jumlah_sembuh');
        $jumlah_meninggal = Tracking::where('tanggal', date('Y-m-d'))->sum('jumlah_meninggal');

        $join = DB::table('trackings')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->get();
        $arr1 = [
            'jumlah_positif' =>$join->sum('jumlah_positif'),
            'jumlah_sembuh' =>$join->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$join->sum('jumlah_meninggal'),
        ];
        $arr2 = [
            'jumlah_positif' =>$jumlah_positif,
            'jumlah_sembuh' =>$jumlah_sembuh,
            'jumlah_meninggal' =>$jumlah_meninggal,
        ];
        $arr = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $arr2,
                'total' => $arr1
            ],
            'message' => 'Berhasil'
        ];
        
        return response()->json($arr, 200);
    }
    public function provinsii()
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('provinsis')
                ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->select('nama_provinsi',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_provinsi')
                ->get();

        $data = DB::table('provinsis')
                ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->select('nama_provinsi',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_provinsi')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function provinssi($id)
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('provinsis')
                ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->where('provinsis.id',$id)
                ->select('nama_provinsi',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_provinsi')
                ->get();

        $data = DB::table('provinsis')
                ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->where('provinsis.id',$id)
                ->select('nama_provinsi',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_provinsi')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function kota()
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('kotas')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->select('nama_kota',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_kota')
                ->get();

        $data = DB::table('kotas')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->select('nama_kota',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_kota')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function kota1($id)
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('kotas')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->where('kotas.id',$id)
                ->select('nama_kota',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_kota')
                ->get();

        $data = DB::table('kotas')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->where('kotas.id',$id)
                ->select('nama_kota',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_kota')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function kecamatan()
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('kecamatans')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->select('nama_kecamatan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_kecamatan')
                ->get();

        $data = DB::table('kecamatans')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->select('nama_kecamatan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_kecamatan')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function kecamatan1($id)
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('kecamatans')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->where('kecamatans.id',$id)
                ->select('nama_kecamatan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_kecamatan')
                ->get();

        $data = DB::table('kecamatans')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->where('kecamatans.id',$id)
                ->select('nama_kecamatan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_kecamatan')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function kelurahan()
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('kelurahans')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->select('nama_kelurahan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_kelurahan')
                ->get();

        $data = DB::table('kelurahans')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->select('nama_kelurahan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_kelurahan')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function kelurahan1($id)
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('kelurahans')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->where('kelurahans.id',$id)
                ->select('nama_kelurahan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama_kelurahan')
                ->get();

        $data = DB::table('kelurahans')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->where('kelurahans.id',$id)
                ->select('nama_kelurahan',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_kelurahan')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function rw()
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('rws')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->select('nama',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama')
                ->get();

        $data = DB::table('rws')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->select('nama',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    public function rw1($id)
    {
        $harini = Carbon::now()->format('d-m-y'); 
        $data_skrg = DB::table('rws')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->whereDate('trackings.tanggal', date('Y-m-d'))
                ->where('rws.id',$id)
                ->select('nama',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('MAX(tanggal) as tanggal'))
                    ->whereDay('tanggal', '=' , $harini)
                ->groupby('nama')
                ->get();

        $data = DB::table('rws')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->where('rws.id',$id)
                ->select('nama',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama')
                ->get();

        $rest = [
            'status' => 200,
            'data' => [ 
                'Hari Ini' =>[$data_skrg],
                'Total' =>[$data]
            ],
            'message' => 'Data Kasus Provinsi Ditampilkan'
        ];
        return response()->json($rest, 200);
    }
    // public function provinsi($id)
    // {
    //     //Data Provinsi Dengan Id
    //     $data = DB::table('provinsis')
    //     ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
    //     ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
    //     ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->where('provinsis.id',$id)
    //     ->select('nama_provinsi',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_provinsi')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }

    // public function provinsi1()
    // {
    //     //Data Provinsi 
    //     $data = DB::table('provinsis')
    //     ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
    //     ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
    //     ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->select('nama_provinsi',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_provinsi')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function indonesia()
    // {
      

    //     //Data SeIndonesia
    //     $positif = DB::table('rws')
    //     ->select('trackings.jumlah_positif','trackings.jumlah_meninggal','trackings.jumlah_sembuh')->join('trackings',
    //             'rws.id', '=', 'trackings.id_rw')->sum('trackings.jumlah_positif');
    //     $meninggal = DB::table('rws')
    //     ->select('trackings.jumlah_positif','trackings.jumlah_meninggal','trackings.jumlah_sembuh')->join('trackings',
    //             'rws.id', '=', 'trackings.id_rw')->sum('trackings.jumlah_meninggal');
    //     $sembuh = DB::table('rws')
    //     ->select('trackings.jumlah_positif','trackings.jumlah_meninggal','trackings.jumlah_sembuh')->join('trackings',
    //             'rws.id', '=', 'trackings.id_rw')->sum('trackings.jumlah_sembuh');

    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => 'Data Kasus Indonesia',
    //                 'Jumlah Positif' => $positif,
    //                 'Jumlah Meninggal' => $meninggal,
    //                 'Jumlah Sembuh' => $sembuh,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function kota()
    // {
    //     //Data Kota
    //     $data = DB::table('kotas')
    //     ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
    //     ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->select('nama_kota',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_kota')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function kota1($id)
    // {
    //     //Data Kota
    //     $data = DB::table('kotas')
    //     ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
    //     ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->where('kotas.id', $id)
    //     ->select('nama_kota',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_kota')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function kecamatan()
    // {
    //     //Data Kecamatan
    //     $data = DB::table('kecamatans')
    //     ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->select('nama_kecamatan',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_kecamatan')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function kecamatan1($id)
    // {
    //     //Data Kecamatan
    //     $data = DB::table('kecamatans')
    //     ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->where('kecamatans.id', $id)
    //     ->select('nama_kecamatan',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_kecamatan')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function kelurahan()
    // {
    //     //Data Kelurahan
    //     $data = DB::table('kelurahans')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->select('nama_kelurahan',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_kelurahan')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function kelurahan1($id)
    // {
    //     //Data Kelurahan
    //     $data = DB::table('kelurahans')
    //     ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->where('kelurahans.id', $id)
    //     ->select('nama_kelurahan',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama_kelurahan')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function rw()
    // {
    //     //Data Kelurahan
    //     $data = DB::table('kelurahans')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->select('nama',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    // public function rw1($id)
    // {
    //     //Data Kelurahan
    //     $data = DB::table('kelurahans')
    //     ->join('trackings','trackings.id_rw', '=', 'rws.id')
    //     ->where('kelurahans.id', $id)
    //     ->select('nama',
    //     DB::raw('sum(trackings.jumlah_positif) as jumlah_positif'),
    //     DB::raw('sum(trackings.jumlah_meninggal) as jumlah_meninggal'),
    //     DB::raw('sum(trackings.jumlah_sembuh) as jumlah_sembuh'))
    //     ->groupBy('nama')
    //     ->get();
    //             $res = [
    //                 'succsess' => true,
    //                 'Data' => $data,
    //                 'message' => 'Data Kasus Di Tampilkan'
    //             ];
    //             return response()->json($res,200);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}