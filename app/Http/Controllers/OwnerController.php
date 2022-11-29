<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnerModel;

class OwnerController extends Controller
{
    function index()
    {
        $data = [
            'owners' => OwnerModel::all(),
        ];

        return view('owners.v_owner', $data);
    }

    function create()
    {
        return view('owners.v_owner_create');
    }

    function store(Request $request)
    {
        OwnerModel::create([
            'nama'              => $request->nama,
            'alamat'            => $request->alamat,
            'telp'              => $request->telp,
            'user_id'           => '1',
        ]);

        return redirect()->route('owners')->with('pesan', 'Data berhasil ditambahkan.');
    }

    function show(Request $request, $id)
    {
        $data = [
            'owner' => OwnerModel::find($id),
        ];

        return view('owners.v_owner_detail', $data);
    }
    function edit($id)
    {
        $data = [
            'owner' => OwnerModel::findOrFail($id)
        ];

        return view('owners.v_owner_edit', $data);
    }

    function update(Request $request)
    {
        $owner = OwnerModel::find($request->id);;
        $owner->nama    = Request()->nama;
        $owner->alamat  = Request()->alamat;
        $owner->telp    = Request()->telp;
        $owner->save();

        return redirect()->route('owners')->with('pesan', 'Data berhasil diperbaharui.');
    }

    function destroy(Request $request)
    {
        $owner = OwnerModel::findOrFail($request->id);
        $owner->delete();

        return redirect()->route('owners')->with('pesan', 'Data berhasil dihapus.');
    }
}
