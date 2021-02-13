<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        $res = [
            'success' => true,
            'data'    => $provinsi,
            'message' => 'Data Provinsi Di Tampilkan'
        ];
        return response()->json($res,200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();

        $res = [
            'success' => true,
            'data'    => $provinsi,
            'message' => 'Data Provinsi Di Tambah'
        ];
        return response()->json($res,200);
    }

    public function show($id)
    {
         $provinsi = Provinsi::whereId($id)->first();

         $res = [
            'success' => true,
            'data'    => $provinsi,
            'message' => 'Berhasil'
        ];
        return response()->json($res,200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        $res = [
            'success' => true,
            'data'    => $provinsi,
            'message' => 'Data Berhasil Di Hapus'
        ];
        return response()->json($res,200);
    }
}
