<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SugargliderModel;
use App\Models\OwnerModel;
use App\Models\ShelterModel;

class PageController extends Controller
{
    function index()
    {
        $data = [
            'count_sugargliders'    => SugargliderModel::count(),
            'count_shelters'        => ShelterModel::count(),
            'shelters'              => ShelterModel::all(),
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
}
