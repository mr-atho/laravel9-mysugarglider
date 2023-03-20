<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SugargliderModel;
use App\Models\ShelterModel;
use App\Models\CollectionModel;
use App\Models\AdoptionModel;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::find(Auth::id()),
            'count_sugargliders'    => SugargliderModel::where('user_id', Auth::id())->count(),
            'count_shelters'        => ShelterModel::where('user_id', Auth::id())->count(),
            'count_collections'     => CollectionModel::whereIn('status', [2, 3])->where('user_id', Auth::id())->count(),
            'count_adoptions'       => AdoptionModel::where('user_id', Auth::id())->where('status', 1)->count(),
            'count_adoptable'       => AdoptionModel::where('user_id', '!=', Auth::id())->where('status', 1)->count(),
        ];
        return view('dashboard.v_index', $data);
    }
}
