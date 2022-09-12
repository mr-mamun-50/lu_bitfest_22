<?php

namespace App\Http\Controllers\Admin\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BusAllocationController extends Controller
{

    public function index()
    {

        $demands = DB::table('demands')
            ->join('users', 'demands.user_id', '=', 'users.id')
            ->join('bus_routes', 'demands.route_id', '=', 'bus_routes.id')
            ->get();

            dd($demands);


        // $day = date("l");
        // $timeSlot = DB::table('schedules')->get();
        // $totalRoutes = DB::table('route_stopages')->get();


        // $routes=0;

        // for($k=0; $k<count($timeSlot); $k++){

        //     for($j=0; $j<count($totalRoutes); $j++){

        //         $totalStopage = DB::table('route_stopages')->where('route_id', $totalRoutes[$j]->route_id)->orderby('order', 'asc')->get();

        //         // $stopage = DB::table('stopages')->where('id', $totalRoutes[$j]->stopage_id)->get();

        //         $routes = DB::table('bus_routes')->where('id', $totalRoutes[$j]->route_id)->get();
        //     }

        // }
        // dd ($routes);




    }

}
