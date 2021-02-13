<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Controllers\DB;

class KelurahanController extends Controller
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
        $kelurahan = Kelurahan::join('kecamatans','kelurahans.id_kecamatan','=','kecamatans.id')->select('kelurahans.*','nama_kecamatan')->get();
        return view('admin.kelurahan.index', compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view ('admin.kelurahan.create',compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelurahan = new Kelurahan;
        $request->validate([
            'nama_kelurahan' => 'required|unique:kelurahans,nama_kelurahan|regex:/^[a-z A-Z]+$/u|min:4|max:20',
        ],[
            'nama_kelurahan.required' => 'Kelurahan required'
        ]);

        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
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
        $kelurahan = Kelurahan::findOrFail($id);
        return view ('admin.kelurahan.show', compact('kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view ('admin.kelurahan.edit', compact('kelurahan','kecamatan'));
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
        $kelurahan = Kelurahan::findOrFail($id);
        $request->validate([
            'nama_kelurahan' => 'required|unique:kelurahans,nama_kelurahan|regex:/^[a-z A-Z]+$/u|min:4|max:20',
        ],[
            'nama_kelurahan.required' => 'Kelurahan required'
        ]);
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
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
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')
              ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
