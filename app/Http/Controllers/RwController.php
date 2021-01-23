<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use\Controllers\DB;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('admin.rw.index', compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view ('admin.rw.create',compact('kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rw = new Rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama = $request->nama;
        $rw->save();
        return redirect()->route('rw.index')
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
        $rw = Rw::findOrFail($id);
        return view ('admin.rw.show', compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view ('admin.rw.edit', compact('rw','kelurahan'));
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
        $rw = Rw::findOrFail($id);
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama = $request->nama;
        $rw->save();
        return redirect()->route('rw.index')
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
        $rw = Rw::findOrFail($id);
        $rw->delete();
        return redirect()->route('rw.index')
              ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
