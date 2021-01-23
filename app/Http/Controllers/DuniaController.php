<?php

namespace App\Http\Controllers;

use App\Models\Dunia;
use Illuminate\Http\Request;

class DuniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $negara = Dunia::all();
        return view('admin.negara.index', compact('negara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.negara.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $negara = new Dunia;
        $negara->kode_negara = $request->kode_negara;
        $negara->nama_negara = $request->nama_negara;
        $negara->save();
        return redirect()->route('negara.index')
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
        $negara = Dunia::findOrFail($id);
        return view ('admin.negara.show', compact('negara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negara = Dunia::findOrFail($id);
        return view ('admin.negara.edit', compact('negara'));
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
        $negara = Dunia::findOrFail($id);
        $negara->kode_negara = $request->kode_negara;
        $negara->nama_negara = $request->nama_negara;
        $negara->save();
        return redirect()->route('negara.index')
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
        $negara = Dunia::findOrFail($id);
        $negara->delete();
        return redirect()->route('negara.index')
              ->with(['message' => 'Data Berhasil Dihapus']);
    }
}
