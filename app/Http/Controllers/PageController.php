<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SugargliderModel;

class PageController extends Controller
{
    function index()
    {
        $data = [
            'sugargliders_count' => SugargliderModel::count(),
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
