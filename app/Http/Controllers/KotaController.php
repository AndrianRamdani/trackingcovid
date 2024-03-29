<?php

namespace App\Http\Controllers;

use Controllers\DB;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
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
        $kota = Kota::join('provinsis','kotas.id_provinsi','=','provinsis.id')->select('kotas.*','nama_provinsi')->get();
        return view('admin.kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view ('admin.kota.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kota = new Kota;
        $request->validate([
            'kode_kota' => 'required|unique:kotas,kode_kota|numeric',
            'nama_kota' => 'required|unique:kotas,nama_kota|min:4|regex:/^[a-z A-Z]+$/u|max:20',
        ],[
            'kode_kota.required' => 'Kode Kota tidak boleh kosong',
            'kode_kota.numeric' => 'Kode Kota tidak boleh menggunakan huruf abjad.',
            'kode_kota.unique' => 'Kode Kota sudah terdaftar',
            'nama_kota.required' => 'Nama Kota tidak boleh kosong',
            'nama_kota.regex' => 'Nama Kota tidak boleh menggunakan angka.',
            'nama_kota.min' => 'Kode Minimal 4 karakter',
            'nama_kota.max' => 'Kode maximal 28 karakter',
            'nama_kota.unique' => 'Nama Kota sudah terdaftar'
        ]);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')
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
        $kota = Kota::findOrFail($id);
        return view ('admin.kota.show', compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view ('admin.kota.edit', compact('kota','provinsi'));
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
        $kota = Kota::findOrFail($id);
        $request->validate([
            'kode_kota' => 'required|unique:kotas,kode_kota|numeric',
            'nama_kota' => 'required|unique:kotas,nama_kota|min:4|regex:/^[a-z A-Z]+$/u|max:28',
        ],[
            'kode_kota.required' => 'Kode Kota tidak boleh kosong',
            'kode_kota.numeric' => 'Kode Kota tidak boleh menggunakan huruf abjad.',
            'kode_kota.unique' => 'Kode Kota sudah terdaftar',
            'nama_kota.required' => 'Nama Kota tidak boleh kosong',
            'nama_kota.regex' => 'Nama Kota tidak boleh menggunakan angka.',
            'nama_kota.min' => 'Kode Minimal 4 karakter',
            'nama_kota.max' => 'Kode maximal 28 karakter',
            'nama_kota.unique' => 'Nama Kota sudah terdaftar'
        ]);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')
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
        $kota = Kota::findOrFail($id);
        $kota->delete();
        return redirect()->route('kota.index')
              ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
