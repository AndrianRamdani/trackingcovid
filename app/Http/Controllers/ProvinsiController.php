<?php

namespace App\Http\Controllers;

use Controllers\DB;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
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
        $provinsi = Provinsi::all();
        return view('admin.provinsi.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provinsi = new Provinsi;
        $request->validate([
            'kode_provinsi' => 'required|int|unique:provinsis,kode_provinsi|alpha_num|numeric',
            'nama_provinsi' => 'required|unique:provinsis,nama_provinsi|regex:/^[a-z A-Z]+$/u|min:4|max:20',
        ],[
            'kode_provinsi.required' => 'Kode is required',
            'nama_provinsi.required' => 'Provinsi required'
        ]);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
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
        $provinsi = Provinsi::findOrFail($id);
        return view ('admin.provinsi.show', compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view ('admin.provinsi.edit', compact('provinsi'));
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
        $provinsi = Provinsi::findOrFail($id);
        $request->validate([
            'kode_provinsi' => 'required|int|unique:provinsis,kode_provinsi|alpha_num|numeric',
            'nama_provinsi' => 'required|unique:provinsis,nama_provinsi|regex:/^[a-z A-Z]+$/u|min:4|max:20',
        ],[
            'kode_provinsi.required' => 'Kode is required',
            'nama_provinsi.required' => 'Provinsi required'
        ]);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
        ->with(['message' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index')
              ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
