<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index() {

        $users = DB::table('users')->get();

        return view('admin.dashboard', compact('users'));
    }
}
