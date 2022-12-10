<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SugargliderModel;
use App\Models\ShelterModel;

class SugargliderController extends Controller
{
    function index()
    {
        $data = [
            'sugargliders' => SugargliderModel::all(),
        ];

        return view('sugargliders/v_sugarglider', $data);
    }

    function backend_sugarglider_index()
    {
        $shelter = ShelterModel::where('user_id', Auth::id())->first();

        if (is_null($shelter)) {
            return view('shelters.v_backend_shelter_no');
        } else {
            $data = [
                'sugargliders' => SugargliderModel::where('shelter_id', $shelter->id)->get()
            ];

            return view('sugargliders.v_backend_sugarglider_index', $data);
        }
    }

    function create()
    {
        $data = [
            'shelters' => ShelterModel::where('status', 1)->where('user_id', Auth::id())->get(),
        ];
        return view('sugargliders.v_backend_sugarglider_create', $data);
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
            'shelter_id'        => $request->shelter_id,
            'adopsi'            => $request->adopsi,
        ]);

        return redirect()->route('sugarglider.index')->with('pesan', 'Data berhasil ditambahkan.');
    }

    function show($id)
    {
        $data = [
            'sugarglider' => SugargliderModel::find($id),
        ];

        return view('sugargliders/v_sugarglider_detail', $data);
    }

    function edit($id)
    {
        $data = [
            'sugarglider' => SugargliderModel::findOrFail($id),
            'shelters' => ShelterModel::where('status', 1)->where('user_id', Auth::id())->get(),
        ];

        return view('sugargliders.v_backend_sugarglider_edit', $data);
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
        $sugarglider->shelter_id        = Request()->shelter_id;
        $sugarglider->adopsi            = Request()->adopsi;

        $sugarglider->save();

        return redirect()->route('sugarglider.index')->with('pesan', 'Data berhasil diperbaharui.');
    }

    function destroy(Request $request)
    {
        $sugarglider = SugargliderModel::findOrFail($request->id);
        $sugarglider->delete();

        return redirect()->route('sugarglider.index')->with('pesan', 'Data berhasil dihapus.');
    }
}
