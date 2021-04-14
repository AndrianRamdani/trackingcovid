<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Http;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\RW;
use App\Http\Models\Tracking;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        // positif
        $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
        $positif = json_decode($datapositif, TRUE);
        // sembuh
        $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
        $sembuh = json_decode($datasembuh, TRUE);
        // meninggal
        $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
        $meninggal = json_decode($datameninggal, TRUE);
        // global
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);

        $posi = DB::table('trackings')
        ->sum('trackings.jumlah_positif');
        $meni= DB::table('trackings')
        ->sum('trackings.jumlah_meninggal');
        $sem = DB::table('trackings')
        ->sum('trackings.jumlah_sembuh');

        
        $tanggal = Carbon::now()->isoFormat('dddd, D MMMM Y hh:mm:s');
        // provinsi
        $provinsi = DB::table('provinsis')
                ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
                ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
                ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
                ->join('trackings','trackings.id_rw', '=', 'rws.id')
                ->select('nama_provinsi',
                    DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                    DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'),
                    DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'))
                ->groupby('nama_provinsi')->orderBy('nama_provinsi','ASC')
                ->get();

        return view('frontend.index', compact('positif','sembuh','meninggal','dunia','tanggal','provinsi','posi','sem','meni'));
    }
}
