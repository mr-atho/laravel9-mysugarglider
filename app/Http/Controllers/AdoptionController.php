<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileModel;
use App\Models\ShelterModel;
use App\Models\CollectionModel;

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
            $collection = CollectionModel::whereIn('status', [2, 3])->where('user_id', Auth::id())->first();

            if (is_null($collection)) {
                return view('collections.v_backend_collection_no');
            } else {
                $data = [
                    'adoptions' => ShelterModel::where('user_id', Auth::id())->paginate(10)
                ];

                return view('adoption.v_backend_adoption_index', $data);
            }
        }
    }

    function create()
    {
    }
    function store()
    {
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
}
