<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;
use Controllers\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kecamatan = Kecamatan::join('kotas','kecamatans.id_kota','=','kotas.id')->select('kecamatans.*','nama_kota')->get();
        return view('admin.kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        return view ('admin.kecamatan.create',compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kecamatan = new Kecamatan;
        $request->validate([
            'kode_kecamatan' => 'required|int|unique:kecamatans,kode_kecamatan|alpha_num|numeric',
            'nama_kecamatan' => 'required|unique:kecamatans,nama_kecamatan|regex:/^[a-z A-Z]+$/u|min:4|max:20',
        ],[
            'kode_kecamatan.required' => 'Kode is required',
            'nama_kecamatan.required' => 'kecamatan required'
        ]);
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
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
        $kecamatan = Kecamatan::findOrFail($id);
        return view ('admin.kecamatan.show', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view ('admin.kecamatan.edit', compact('kecamatan','kota'));
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
        $kecamatan = Kecamatan::findOrFail($id);
        $request->validate([
            'kode_kecamatan' => 'required|int|unique:kecamatans,kode_kecamatan|alpha_num|numeric',
            'nama_kecamatan' => 'required|unique:kecamatans,nama_kecamatan|regex:/^[a-z A-Z]+$/u|min:4|max:20',
        ],[
            'kode_kecamatan.required' => 'Kode is required',
            'nama_kecamatan.required' => 'kecamatan required'
        ]);
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
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
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')
              ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
