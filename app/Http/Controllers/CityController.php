<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->query('id');
         $get = DB::table('city_table')->where('city_id', $id)->first();
        return [
            'status' => 'berhasil',
            'code' => 200,
            'resuts' => $get
        ];
    }
}
