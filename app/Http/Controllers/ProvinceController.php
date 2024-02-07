<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->query('id');
        $get = DB::table('province_table')->where('province_id', $id)->first();
        return [
            'status' => 'berhasil',
            'code' => 200,
            'resuts' => $get
        ];
    }
}
