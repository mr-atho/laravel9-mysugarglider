<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SugargliderModel;

class SugargliderController extends Controller
{
    function index()
    {
        $data = [
            'sugargliders' => SugargliderModel::all(),
        ];

        return view('sugargliders/v_sugarglider', $data);
    }

    function create()
    {
        return view('sugargliders/v_sugarglider_create');
    }

    function store(Request $request)
    {
        SugargliderModel::create([
            'kode'              => $request->kode,
            'nama'              => $request->nama,
            'kelamin'           => $request->kelamin,
            'oop'               => $request->oop,
            'warna'             => $request->warna,
            'jenis'             => $request->jenis,
            'genetika'          => $request->genetika,
            'fenotype'          => $request->fenotype,
            'indukan_betina'    => $request->indukan_betina,
            'indukan_jantan'    => $request->indukan_jantan,
            'gambar'            => $request->gambar,
            'keterangan'        => $request->keterangan,
            'adopsi'            => $request->adopsi,
        ]);

        return redirect()->route('sugargliders')->with('pesan', 'Data berhasil ditambahkan.');
    }

    function show(Request $request, $id)
    {
        $data = [
            'sugarglider' => SugargliderModel::find($id),
        ];

        return view('sugargliders/v_sugarglider_detail', $data);
    }

    function edit($id)
    {
        $data = [
            'sugarglider' => SugargliderModel::findOrFail($id)
        ];

        return view('sugargliders/v_sugarglider_edit', $data);
    }

    function update(Request $request)
    {
        $sugarglider = SugargliderModel::find($request->id);

        $sugarglider->kode              = Request()->kode;
        $sugarglider->nama              = Request()->nama;
        $sugarglider->kelamin           = Request()->kelamin;
        $sugarglider->oop               = Request()->oop;
        $sugarglider->warna             = Request()->warna;
        $sugarglider->jenis             = Request()->jenis;
        $sugarglider->genetika          = Request()->genetika;
        $sugarglider->fenotype          = Request()->fenotype;
        $sugarglider->indukan_betina    = Request()->indukan_betina;
        $sugarglider->indukan_jantan    = Request()->indukan_jantan;
        $sugarglider->gambar            = Request()->gambar;
        $sugarglider->keterangan        = Request()->keterangan;
        $sugarglider->adopsi            = Request()->adopsi;

        $sugarglider->save();

        return redirect()->route('sugargliders')->with('pesan', 'Data berhasil diperbaharui.');
    }

    function destroy(Request $request)
    {
        $sugarglider = SugargliderModel::findOrFail($request->id);
        $sugarglider->delete();

        return redirect()->route('sugargliders')->with('pesan', 'Data berhasil dihapus.');
    }
}
