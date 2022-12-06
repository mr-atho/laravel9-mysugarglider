<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShelterModel;
use App\Models\ProfileModel;

class ShelterController extends Controller
{
    function index()
    {
        $data = [
            'shelters' => ShelterModel::all(),
        ];

        return view('shelters.v_shelter', $data);
    }

    function dashboard_shelters_index()
    {
        $profile = ProfileModel::find(Auth::id());

        if (is_null($profile)) {
            return view('profiles.v_profile_no');

        }
        else {
            $data = [
                'shelters' => ShelterModel::where('user_id', Auth::id())->get()
                //'shelters' => ShelterModel::addSelect(['owner_id' => OwnerModel::select('nama')->whereColumn('owner_id', 'owners.id')])->get()
            ];

            return view('shelters.v_shelter_dashboard_index', $data);
        }


    }

    function create()
    {
        return view('shelters/v_shelter_create');
    }

    function store(Request $request)
    {
        ShelterModel::create([
            'nama'              => $request->nama,
            'kode'              => $request->kode,
            'alamat'            => $request->alamat,
            'status'            => $request->status,
            'owner_id'          => Auth::user()->id,
        ]);

        return redirect()->route('shelters')->with('pesan', 'Data berhasil ditambahkan.');
    }

    function show($id)
    {
        $data = [
            'shelter' => ShelterModel::find($id),
        ];

        return view('shelters/v_shelter_detail', $data);
    }
    function edit($id)
    {
        $data = [
            'shelter' => ShelterModel::findOrFail($id)
        ];

        return view('shelters/v_shelter_edit', $data);
    }

    function update(Request $request)
    {
        $shelter = ShelterModel::find($request->id);
        $shelter->nama    = Request()->nama;
        $shelter->kode    = Request()->kode;
        $shelter->alamat  = Request()->alamat;
        $shelter->status  = Request()->status;
        $shelter->owner_id  = Auth::id();
        $shelter->save();

        return redirect()->route('shelters')->with('pesan', 'Data berhasil diperbaharui.');
    }

    function destroy(Request $request)
    {
        $shelter = ShelterModel::findOrFail($request->id);
        $shelter->delete();

        return redirect()->route('shelters')->with('pesan', 'Data berhasil dihapus.');
    }
}
