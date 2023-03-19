<?php

namespace App\Http\Controllers;

use App\Models\AdoptionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdoptionRequestModel;
use App\Models\CollectionModel;
use App\Models\SugargliderModel;

class AdoptionRequestController extends Controller
{
    function index()
    {
    }
    function create()
    {
    }

    function store(Request $request)
    {
        AdoptionRequestModel::create([
            'adoption_id'   => $request->adoption_id,
            'harga'         => $request->harga,
            'status'        => 1,
            'keterangan'    => $request->keterangan,
            'user_id'       => Auth::id(),
            'shelter_id'    => $request->shelter_id,
        ]);

        return redirect()->route('adoption.list')->with('pesan', 'Data berhasil dikirimkan.');
    }
    function show()
    {
    }
    function edit()
    {
    }
    function update()
    {
    }
    function destroy()
    {
    }

    function backend_adoption_select(Request $request)
    {
        $adoption = $request->adoption_id;

        $adoptionrequest = AdoptionRequestModel::find($request->adoption_request_id);
        $adoptionrequest->status = 5;
        $adoptionrequest->save();


        AdoptionRequestModel::where('adoption_id', $request->adoption_id)
            ->where('status', '=', 1)
            ->where('id', '!=', $request->adoption_request_id)
            ->update([
                'status' => 4
            ]);

        return redirect()->route('adoption.request', $adoption)->with('pesan', 'Data berhasil diperbaharui.');
    }

    function backend_adoption_shipping(Request $request)
    {
        $adoptionrequest            =   AdoptionRequestModel::find($request->id);
        $adoptionrequest->status    =   7;
        $adoptionrequest->save();

        $adoption_id                =   $request->adoption_id;

        return redirect()->route('adoption.request', $request->adoption_id)->with('pesan', 'Data berhasil diperbaharui.');
    }

    function backend_adoption_finalize(Request $request)
    {
        $sugarglider                =   SugargliderModel::find($request->sugarglider_id);
        $sugarglider->user_id       =   Auth::id();
        $sugarglider->save();

        $collection                 =   CollectionModel::find($request->collection_id);
        $collection->shelter_id     =   Request()->shelter_id;
        $collection->status         =   2;
        $collection->user_id        =   Auth::id();
        $collection->save();

        $adoption                   =   AdoptionModel::find($request->id);
        $adoption->status           =   0;
        $adoption->save();

        $adoptionrequest            =   AdoptionRequestModel::find($request->adoptionrequest_id);
        $adoptionrequest->status    =   8;
        $adoptionrequest->save();

        return redirect()->route('collection.index')->with('pesan', 'Data berhasil dipindahkan.');
    }
}
