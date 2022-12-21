<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\ShelterModel;
use App\Models\ProfileModel;

class ShelterController extends Controller
{
    function index()
    {
        $data = [
            //'shelters' => ShelterModel::all(),
            'shelters' => ShelterModel::with('sugargliders')->get()
        ];

        return view('shelters.v_shelter', $data);
    }

    function backend_shelters_index()
    {
        $profile = ProfileModel::where('user_id', Auth::id())->first();

        if (is_null($profile)) {
            return view('profiles.v_profile_no');
        } else {
            $data = [
                'shelters' => ShelterModel::where('user_id', Auth::id())->get()
            ];

            return view('shelters.v_backend_shelter_index', $data);
        }
    }

    function create()
    {
        return view('shelters.v_backend_shelter_create');
    }

    function store(Request $request)
    {
        if ($request->hasFile('image')) {

            // Only allow .jpg, .bmp and .png file types.
            $request->validate([
                'image' => 'mimes:jpg,jpeg,bmp,png'
            ]);

            $image = $request->file('image');
            $imagename = 'shelter-' . $request->kode . '.' . $image->extension();

            Image::make($image)->fit(
                150,
                150,
                function ($constraint) {
                    //$constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save(public_path('upload/shelters/' . $imagename));
        } else {
            $imagename = null;
        }

        ShelterModel::create([
            'nama'              => $request->nama,
            'kode'              => $request->kode,
            'alamat'            => $request->alamat,
            'status'            => $request->status,
            'user_id'           => Auth::id(),
            'image'             => $imagename,
        ]);

        return redirect()->route('shelter.index')->with('pesan', 'Data berhasil ditambahkan.');
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

        $this->authorize('update', ShelterModel::find($id));

        $data = [
            'shelter' => ShelterModel::findOrFail($id)
        ];

        return view('shelters.v_backend_shelter_edit', $data);
    }

    function update(Request $request)
    {
        $shelter = ShelterModel::find($request->id);
        $shelter->nama    = Request()->nama;
        $shelter->kode    = Request()->kode;
        $shelter->alamat  = Request()->alamat;
        $shelter->status  = Request()->status;
        $shelter->user_id  = Auth::id();

        if ($request->hasFile('image')) {

            // Only allow .jpg, .bmp and .png file types.
            $request->validate([
                'image' => 'mimes:jpg,jpeg,bmp,png'
            ]);

            $image = $request->file('image');
            $imagename = 'shelter-' . $shelter->kode . '.' . $image->extension();

            Image::make($image)->fit(
                150,
                150,
                function ($constraint) {
                    //$constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save(public_path('upload/shelters/' . $imagename));

            $shelter->image = $imagename;
        }

        $shelter->save();

        return redirect()->route('shelter.index')->with('pesan', 'Data berhasil diperbaharui.');
    }

    function destroy(Request $request)
    {
        $shelter = ShelterModel::findOrFail($request->id);

        //if ($shelter->sugargliders()->count()) {
        //    return back()->withErrors('Tidak dapat menghapus. Kandang memiliki data sugar glider.');
        //}

        $shelter->delete();

        return redirect()->route('shelter.index')->with('pesan', 'Data berhasil dihapus.');
    }
}
