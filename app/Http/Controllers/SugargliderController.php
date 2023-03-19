<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\SugargliderModel;
use App\Models\ProfileModel;
use App\Models\ShelterModel;
use App\Models\CollectionModel;

class SugargliderController extends Controller
{
    function index()
    {
        $data = [
            'sugargliders' => SugargliderModel::paginate(20),
        ];

        return view('sugargliders.v_sugarglider', $data);
    }

    function backend_sugarglider_index()
    {
        $profile = ProfileModel::where('user_id', Auth::id())->first();
        $shelter = ShelterModel::where('user_id', Auth::id())->first();

        if (is_null($profile)) {
            return view('profiles.v_profile_no');
        } elseif (is_null($shelter)) {
            return view('shelters.v_backend_shelter_no');
        } else {
            $data = [
                'sugargliders' => SugargliderModel::where('user_id', Auth::id())->paginate(10),
            ];

            return view('sugargliders.v_backend_sugarglider_index', $data);
        }
    }

    function create()
    {
        $data = [
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
            $imagename = 'sg-' . $request->kode . '.' . $image->extension();

            Image::make($image)->fit(
                500,
                500,
                function ($constraint) {
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
            'user_id'           => Auth::id(),
            'adopsi'            => $request->adopsi,
        ]);

        return redirect()->route('sugarglider.index')->with('pesan', 'Data berhasil ditambahkan.');
    }

    function show($id)
    {
        $data = [
            'indukan' =>
            SugargliderModel::leftjoin('sugargliders as m', 'sugargliders.indukan_jantan', '=', 'm.id')
                ->leftjoin('sugargliders as f', 'sugargliders.indukan_betina', '=', 'f.id')
                ->select(
                    'sugargliders.nama as nama',
                    'sugargliders.id as id',
                    'sugargliders.jenis as jenis',
                    'm.nama as jantan',
                    'm.id as mId',
                    'm.jenis as mJenis',
                    'f.nama as betina',
                    'f.id as fId',
                    'f.jenis as fJenis',
                )
                ->where('sugargliders.id', $id)
                ->first(),

            'collection' =>
            CollectionModel::leftjoin('shelters', 'collections.shelter_id', '=', 'shelters.id')
                ->leftjoin('sugargliders', 'collections.sugarglider_id', '=', 'sugargliders.id')
                ->select(
                    'sugargliders.id as sgId',
                    'sugargliders.kode as sgKode',
                    'sugargliders.nama as sgNama',
                    'sugargliders.kelamin as sgKelamin',
                    'sugargliders.oop as sgOOP',
                    'sugargliders.warna as sgWarna',
                    'sugargliders.jenis as sgJenis',
                    'sugargliders.genetika as sgGenetika',
                    'sugargliders.fenotype as sgFenotype',
                    'sugargliders.indukan_jantan as sgIndukanJantan',
                    'sugargliders.indukan_betina as sgIndukanBetina',
                    'sugargliders.gambar as sgGambar',
                    'sugargliders.keterangan as sgKeterangan',
                    'shelters.id as stId',
                    'shelters.nama as stNama',
                    'collections.status as clStatus'
                )
                ->where('sugargliders.id', '=', $id)
                ->first(),

            'keturunans' =>
            CollectionModel::join('sugargliders', 'sugargliders.id', '=', 'collections.sugarglider_id')
                ->select(
                    'sugargliders.id',
                    'sugargliders.nama',
                    'sugargliders.jenis'
                )
                ->where('sugargliders.indukan_betina', '=', $id)
                ->orWhere('sugargliders.indukan_jantan', '=', $id)
                ->get(),
        ];

        return view('sugargliders.v_sugarglider_detail', $data);
    }

    function edit($id)
    {
        $this->authorize('update', SugargliderModel::find($id));

        $data = [
            'sugarglider' => SugargliderModel::findOrFail($id),
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

        if ($request->hasFile('gambar')) {

            // Only allow .jpg, .bmp and .png file types.
            $request->validate([
                'gambar' => 'mimes:jpg,jpeg,bmp,png'
            ]);

            $image = $request->file('gambar');
            $imagename = 'sg-' . $request->kode . '.' . $image->extension();

            Image::make($image)->fit(
                500,
                500,
                function ($constraint) {
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
