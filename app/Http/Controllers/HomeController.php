<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
  public function index(){
    $me = auth()->user();
    return view('dashboard', compact('me'));
  }
}
