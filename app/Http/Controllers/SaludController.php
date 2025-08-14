<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SaludController extends Controller
{
    public function index()
    {
        return response()->json([
            'db' => DB::connection()->getDatabaseName(),
            'tablas' => DB::select('SHOW TABLES'),
            'mysql_version' => DB::selectOne('SELECT VERSION() v')->v,
        ]);
    }
}
