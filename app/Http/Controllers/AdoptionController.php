<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileModel;
use App\Models\ShelterModel;
use App\Models\CollectionModel;
use App\Models\SugargliderModel;
use App\Models\AdoptionModel;
use App\Models\AdoptionRequestModel;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class AdoptionController extends Controller
{
    function index()
    {
        return view('adoption.v_backend_adoption_index');
    }

    function backend_adoption_index()
    {
        $profile = ProfileModel::where('user_id', Auth::id())->first();

        if (is_null($profile)) {
            return view('profiles.v_profile_no');
        } else {
            $collection = CollectionModel::whereIn('status', [1, 3])->where('user_id', Auth::id())->first();

            if (is_null($collection)) {
                return view('collections.v_backend_colllection_no_adoption');
            } else {
                $data = [
                    'adoptions' => AdoptionModel::select(
                        'adoptions.id as id',
                        'adoptions.harga as harga',
                        'sugargliders.nama as nama',
                        'sugargliders.jenis as jenis',
                        DB::raw('COUNT(adoption_requests.adoption_id) as total_permohonan')
                    )
                        ->leftJoin('collections', 'collections.id', '=', 'adoptions.collection_id')
                        ->leftJoin('sugargliders', 'sugargliders.id', '=', 'collections.sugarglider_id')
                        ->leftJoin('adoption_requests', 'adoption_requests.adoption_id', '=', 'adoptions.id')
                        ->where('collections.status', 3)
                        ->where('adoptions.status', 1)
                        ->where('adoptions.user_id', Auth::id())
                        ->groupBy('adoption_requests.adoption_id', 'adoptions.id', 'adoptions.harga', 'sugargliders.nama', 'sugargliders.jenis')
                        ->paginate(10)
                ];

                return view('adoption.v_backend_adoption_index', $data);
            }
        }
    }

    function create()
    {
        $sugarglidercollections = CollectionModel::select('sugarglider_id')->where('status', '3')->get();
        $adoption = AdoptionModel::pluck('collection_id')->all();

        $data = [
            'collections' => CollectionModel::select('collections.id', 'sugargliders.nama as nama')
                ->whereIn('sugargliders.id', $sugarglidercollections)
                ->whereNotIn('collections.sugarglider_id', $adoption)
                ->leftJoin('sugargliders', 'collections.sugarglider_id', '=', 'sugargliders.id')
                ->leftJoin('adoptions', 'collections.id', '=', 'adoptions.collection_id')
                ->where('sugargliders.user_id', Auth::id())
                ->orderBy('nama', 'asc')
                ->get(),
        ];

        return view('adoption.v_backend_adoption_create', $data);
    }

    function store(Request $request)
    {
        AdoptionModel::create([
            'collection_id'     => $request->collection_id,
            'harga'             => $request->harga,
            'keterangan'        => $request->keterangan,
            'status'            => 1,
            'user_id'           => Auth::id(),
        ]);

        return redirect()->route('adoption.index')->with('pesan', 'Data berhasil ditambahkan.');
    }

    function show()
    {
    }

    function edit($id)
    {
        $this->authorize('update', CollectionModel::find($id));

        $sugarglidercollections = CollectionModel::select('sugarglider_id')->where('status', '3')->get();
        $adoption = AdoptionModel::pluck('collection_id')->all();

        $data = [
            'adoption' => AdoptionModel::select(
                'adoptions.id as id',
                'adoptions.collection_id as collection_id',
                'adoptions.harga as harga',
                'adoptions.keterangan as keterangan',
                'sugargliders.nama as nama'
            )
                ->leftJoin('collections', 'collections.id', '=', 'adoptions.collection_id')
                ->leftJoin('sugargliders', 'sugargliders.id', '=', 'collections.sugarglider_id')
                ->findOrFail($id),
            'collections' => CollectionModel::select('collections.id', 'sugargliders.nama as nama')
                ->whereIn('sugargliders.id', $sugarglidercollections)
                ->whereNotIn('collections.sugarglider_id', $adoption)
                ->leftJoin('sugargliders', 'collections.sugarglider_id', '=', 'sugargliders.id')
                ->leftJoin('adoptions', 'collections.id', '=', 'adoptions.collection_id')
                ->where('sugargliders.user_id', Auth::id())
                ->orderBy('nama', 'asc')
                ->get(),
        ];

        return view('adoption.v_backend_adoption_edit', $data);
    }
    function update(Request $request)
    {
        $adoption                   =   AdoptionModel::find($request->id);
        $adoption->collection_id    =   Request()->collection_id;
        $adoption->harga            =   Request()->harga;
        $adoption->keterangan       =   Request()->keterangan;
        $adoption->save();

        return redirect()->route('adoption.index')->with('pesan', 'Data berhasil diperbaharui.');
    }
    function destroy()
    {
    }

    function backend_adoption_list()
    {
        $profile = ProfileModel::where('user_id', Auth::id())->first();
        $shelter = ShelterModel::where('user_id', Auth::id())->first();

        if (is_null($profile)) {
            return view('profiles.v_profile_no');
        } elseif (is_null($shelter)) {
            return view('shelters.v_backend_shelter_no');
        } else {
            $data = [
                'adoptions' => AdoptionModel::where('adoptions.user_id', '!=', Auth::id())
                    ->select(
                        'adoptions.id as id',
                        'adoptions.harga as harga',
                        'adoptions.keterangan as keterangan',
                        'sugargliders.nama as sgNama',
                        'sugargliders.id as sgId',
                        'sugargliders.jenis as sgJenis',
                        'shelters.id as sId',
                        'shelters.nama as sNama',
                        'adoption_requests.id as arId',
                        'adoption_requests.status as arStatus',
                        'adoption_requests.harga as arHarga',
                        'collections.id as cId',
                        'adoption_requests.shelter_id as arShelterId'
                    )
                    ->leftJoin('collections', 'collections.id', '=', 'adoptions.collection_id')
                    ->leftJoin('sugargliders', 'sugargliders.id', '=', 'collections.sugarglider_id')
                    ->leftJoin('shelters', 'shelters.id', '=', 'collections.shelter_id')
                    ->leftjoin('adoption_requests', function (JoinClause $join) {
                        $join->on('adoption_requests.adoption_id', '=', 'adoptions.id')
                            ->where('adoption_requests.user_id', '=', Auth::id());
                    })
                    ->where('collections.status', 3)
                    ->orderBy('adoptions.updated_at', 'desc')
                    ->paginate(10),

                'shelters' => ShelterModel::where('user_id', Auth::id())->get()
            ];

            return view('adoption.v_backend_adoption_list', $data);
        }
    }

    function backend_adoption_request(Request $request)
    {
        $data = [
            'shelters' => ShelterModel::where('status', 1)->where('user_id', Auth::id())->orderBy('nama', 'asc')->get(),

            'sugarglider' => SugargliderModel::where('adoptions.id', $request->id)
                ->select(
                    'adoptions.id as id',
                    'sugargliders.nama as nama',
                    'sugargliders.jenis as jenis'
                )
                ->leftJoin('collections', 'collections.sugarglider_id', '=', 'sugargliders.id')
                ->leftJoin('adoptions', 'adoptions.collection_id', '=', 'collections.id')
                ->first(),

            'adoptionrequests' => AdoptionRequestModel::where('adoption_id', $request->id)
                ->select(
                    'users.name as nama',
                    'shelters.id as kandang_id',
                    'shelters.nama as kandang',
                    'adoption_requests.id as id',
                    'adoption_requests.harga as harga',
                    'adoption_requests.status as status',
                    'adoption_requests.keterangan as keterangan',
                    'adoption_requests.created_at as created_at'
                )
                ->leftJoin('users', 'users.id', '=', 'adoption_requests.user_id')
                ->leftJoin('shelters', 'shelters.id', '=', 'adoption_requests.shelter_id')
                ->paginate(10),
        ];

        return view('adoption.v_backend_adoption_requests', $data);
    }
}
