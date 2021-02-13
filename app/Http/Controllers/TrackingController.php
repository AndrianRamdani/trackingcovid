<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Rw;
// use App\Models\Kelurahan;
// use App\Models\Kecamatan;
// use App\Models\Kota;
// use App\Models\Provinsi;
use Controllers\DB;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracking = Tracking::with('rw')->get();
        return view('admin.tracking.index', compact('tracking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        return view ('admin.tracking.create',compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tracking = new Tracking;
        $tracking->id_rw = $request->id_rw;
        $tracking->jumlah_positif = $request->jumlah_positif;
        $tracking->jumlah_meninggal = $request->jumlah_meninggal;
        $tracking->jumlah_sembuh = $request->jumlah_sembuh;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index')
        ->with(['message' => 'Data Berhasil Disimpan']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracking = Tracking::findOrFail($id);
        return view ('admin.tracking.show', compact('tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tracking = Tracking::findOrFail($id);
        $rw = Rw::all();
        return view ('admin.tracking.edit', compact('tracking','rw'));
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
        $tracking = Tracking::findOrFail($id);
        $tracking->id_rw = $request->id_rw;
        $tracking->jumlah_positif = $request->jumlah_positif;
        $tracking->jumlah_meninggal = $request->jumlah_meninggal;
        $tracking->jumlah_sembuh = $request->jumlah_sembuh;
        $tracking->tanggal = $request->tanggal;
        $tracking->save();
        return redirect()->route('tracking.index')
        ->with(['message' => 'Data Berhasil Disimpan']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->delete();
        return redirect()->route('tracking.index')
              ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
