<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SugargliderModel;
use App\Models\ShelterModel;
use App\Models\AdoptionModel;
use App\Models\CollectionModel;

class PageController extends Controller
{
    function index()
    {
        $data = [
            'count_sugargliders'    => SugargliderModel::count(),
            'count_shelters'        => ShelterModel::count(),
            'count_users'           => User::count(),
            'count_collections'     => CollectionModel::whereIn('status', [2, 3])->count(),
            'count_adoptions'       => AdoptionModel::count(),
            'shelters'              => ShelterModel::where('status', '1')->inRandomOrder()->limit(4)->get(),
        ];

        return view('pages/v_home', $data);
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

    function about()
    {
        $data = [
            'count_sugargliders'    => SugargliderModel::count(),
            'count_shelters'        => ShelterModel::count(),
            'count_users'           => User::count(),
            'shelters'              => ShelterModel::where('status', '1')->get(),
        ];
        return view('pages/v_about', $data);
    }
}
