<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\SugargliderModel;
use App\Models\ShelterModel;

class SugargliderController extends Controller
{
    function index()
    {
        $data = [
            'sugargliders' => SugargliderModel::paginate(15),
        ];

        return view('sugargliders/v_sugarglider', $data);
    }

    function backend_sugarglider_index()
    {
        $shelters = ShelterModel::where('user_id', Auth::id())->get();

        if (is_null($shelters)) {
            return view('shelters.v_backend_shelter_no');
        } else {
            $data = [
                //'sugargliders' => SugargliderModel::whereIn('shelter_id', [1, 2, 3])->paginate(10)
                'sugargliders' => SugargliderModel::addSelect([
                    'shelter_id' => ShelterModel::select('id')
                        ->whereColumn('shelter_id', 'id')
                ])->paginate(10)
            ];

            return view('sugargliders.v_backend_sugarglider_index', $data);
        }
    }

    function create()
    {
        $data = [
            'shelters' => ShelterModel::where('status', 1)->where('user_id', Auth::id())->get(),
            'sugargliders' => SugargliderModel::orderBy('nama', 'asc')->get(),
        ];
        return view('sugargliders.v_backend_sugarglider_create', $data);
    }

    function store(Request $request)
    {
        if ($request->hasFile('gambar')) {

            // Only allow .jpg, .bmp and .png file types.
            $request->validate([
                'gambar' => 'mimes:jpg,jpeg,bmp,png'
            ]);

            $image = $request->file('gambar');
            $imagename = 'sg-' . $request->shelter_id . '-' . $request->kode . '.' . $image->extension();

            Image::make($image)->fit(
                150,
                150,
                function ($constraint) {
                    //$constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save(public_path('upload/sugargliders/' . $imagename));
        } else {
            $imagename = null;
        }

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
            'gambar'            => $imagename,
            'keterangan'        => $request->keterangan,
            'shelter_id'        => $request->shelter_id,
            'adopsi'            => $request->adopsi,
        ]);

        return redirect()->route('sugarglider.index')->with('pesan', 'Data berhasil ditambahkan.');
    }

    function show($id)
    {
        $sugarglider = SugargliderModel::find($id);

        if ($sugarglider->indukan_betina != 0)
        {
            $betina = SugargliderModel::select('nama')->where('id', $sugarglider->indukan_betina)->first();
        }
        else {
            $betina = $sugarglider->indukan_betina;
        }

        if ($sugarglider->indukan_jantan != 0)
        {
            $jantan = SugargliderModel::select('nama')->where('id', $sugarglider->indukan_jantan)->first();
        }
        else {
            $jantan = $sugarglider->indukan_jantan;
        }

        $data = [
            'sugarglider' => $sugarglider,
            'betina' => $betina,
            'jantan' => $jantan,
        ];

        return view('sugargliders/v_sugarglider_detail', $data);
    }

    function edit($id)
    {
        $this->authorize('update', SugargliderModel::find($id));

        $data = [
            'sugarglider' => SugargliderModel::findOrFail($id),
            'shelters' => ShelterModel::where('status', 1)->where('user_id', Auth::id())->get(),
            'sugargliders' => SugargliderModel::orderBy('nama', 'asc')->get(),
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
        $sugarglider->keterangan        = Request()->keterangan;
        $sugarglider->shelter_id        = Request()->shelter_id;
        $sugarglider->adopsi            = Request()->adopsi;

        if ($request->hasFile('gambar')) {

            // Only allow .jpg, .bmp and .png file types.
            $request->validate([
                'gambar' => 'mimes:jpg,jpeg,bmp,png'
            ]);

            $image = $request->file('gambar');
            $imagename = 'sg-' . $request->shelter_id . '-' . $request->kode . '.' . $image->extension();

            Image::make($image)->fit(
                150,
                150,
                function ($constraint) {
                    //$constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save(public_path('upload/sugargliders/' . $imagename));

            $sugarglider->gambar = $imagename;
        }

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
