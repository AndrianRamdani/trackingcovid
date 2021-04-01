<?php

namespace App\Http\Controllers;

use DB;
use Http;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\RW;
use App\Http\Models\Tracking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $global = Http::get('https://api.kawalcorona.com/')->json();
        $positif = DB::table('trackings')
            ->sum('trackings.jumlah_positif');

        $sembuh = DB::table('trackings')
            ->sum('trackings.jumlah_sembuh');

        $meninggal = DB::table('trackings')
            ->sum('trackings.jumlah_meninggal');

        $provinsi = DB::table('provinsis')
            ->select('nama_provinsi',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
            ->groupBy('nama_provinsi')
            ->get();
        return view ('admin.index',compact('provinsi', 'sembuh', 'meninggal', 'global', 'positif'));
    }
}
