<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use PDF;
use App\Models\Tracking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // $laporan = Tracking::with('rw')->get();
        return view('admin.reports.provinsi');
    }
    public function ReportProvinsi(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;
        if ($awal < $akhir) {
            $provinsi = Provinsi::select('provinsis.id', 'provinsis.nama_provinsi', 'provinsis.kode_provinsi', 'trackings.tanggal', 'trackings.jumlah_positif', 'trackings.jumlah_sembuh', 'trackings.jumlah_meninggal')
                ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
                ->whereBetween('trackings.tanggal', [$awal, $akhir])
                ->get();
            return view('admin.reports.provinsi', compact('provinsi'));
        } elseif ($awal > $akhir) {
            return redirect()->back()->with(['error' => 'Tanggal yang dimasukkan tidak valid']);
        }
    }

    public function cetak_pdf()
    {
        $laporan = Tracking::with('rw')->get();
        $pdf = PDF::loadview('admin.reports.laporan', compact('laporan'));
        return $pdf->download('Laporan-trackings.pdf');
    }

}
