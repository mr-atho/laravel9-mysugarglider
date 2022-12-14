<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SugargliderModel;
use App\Models\ShelterModel;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $shelter = ShelterModel::where('user_id', Auth::id())->first();

        if ($shelter) {
            $count_sugargliders = SugargliderModel::where('shelter_id', $shelter->id)->count();
        } else {
            $count_sugargliders = '0';
        }

        $data = [
            'user' => User::find(Auth::id()),
            'count_sugargliders'    => $count_sugargliders,
            'count_shelters'        => ShelterModel::where('user_id', Auth::id())->count(),
            //'count_users'           => User::count(),
            //'shelters'              => ShelterModel::all(),
        ];
        return view('dashboard.v_index', $data);
    }
}
