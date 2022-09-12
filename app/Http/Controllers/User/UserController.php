<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    public function dashboard() {

        $stopages = DB::table('stopages')->get();
        $demand = DB::table('demands')->where('user_id', Auth::id())->first();


        $sat_arr_time = DB::table('schedules')->select('arrival_time', 'id')->where('day', 'Saturday')->get();
        $sat_dep_time = DB::table('schedules')->select('departure_time', 'id')->where('day', 'Saturday')->get();
        $sun_arr_time = DB::table('schedules')->select('arrival_time', 'id')->where('day', 'Sunday')->get();
        $sun_dep_time = DB::table('schedules')->select('departure_time', 'id')->where('day', 'Sunday')->get();
        $mon_arr_time = DB::table('schedules')->select('arrival_time', 'id')->where('day', 'Monday')->get();
        $mon_dep_time = DB::table('schedules')->select('departure_time', 'id')->where('day', 'Monday')->get();
        $tue_arr_time = DB::table('schedules')->select('arrival_time', 'id')->where('day', 'Tuesday')->get();
        $tue_dep_time = DB::table('schedules')->select('departure_time', 'id')->where('day', 'Tuesday')->get();
        $wed_arr_time = DB::table('schedules')->select('arrival_time', 'id')->where('day', 'Wednesday')->get();
        $wed_dep_time = DB::table('schedules')->select('departure_time', 'id')->where('day', 'Wednesday')->get();
        $thu_arr_time = DB::table('schedules')->select('arrival_time', 'id')->where('day', 'Thursday')->get();
        $thu_dep_time = DB::table('schedules')->select('departure_time', 'id')->where('day', 'Thursday')->get();
        $fri_arr_time = DB::table('schedules')->select('arrival_time', 'id')->where('day', 'Friday')->get();
        $fri_dep_time = DB::table('schedules')->select('departure_time', 'id')->where('day', 'Friday')->get();

        return view('dashboard', compact('stopages', 'sat_arr_time', 'sat_dep_time', 'sun_arr_time', 'sun_dep_time', 'mon_arr_time', 'mon_dep_time', 'tue_arr_time', 'tue_dep_time', 'wed_arr_time', 'wed_dep_time', 'thu_arr_time', 'thu_dep_time', 'fri_arr_time', 'fri_dep_time', 'demand'));
    }

    public function verify($id) {
        $data = ['is_verified' => 1];

        DB::table('users')->where('id', $id)->update($data);

        $notify = [ 'message' => 'User has been verified successfully!', 'alert-type' => 'success' ];
        return redirect()->back()->with($notify);
    }
}
