<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::find(Auth::id()),
        ];
        return view('dashboard.v_index', $data);
    }
}
