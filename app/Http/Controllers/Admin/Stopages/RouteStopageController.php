<?php

namespace App\Http\Controllers\Admin\Stopages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RouteStopageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route_stopages = DB::table('route_stopages')
                        ->leftjoin('stopages', 'route_stopages.stopage_id', '=', 'stopages.id')
                        ->leftjoin('bus_routes', 'route_stopages.route_id', '=', 'bus_routes.id')
                        ->select('route_stopages.*', 'stopages.label as stopage_label', 'bus_routes.label as route_label')
                        ->get();

        $bus_routes = DB::table('bus_routes')->get();
        $stopages = DB::table('stopages')->get();

        return view('admin.stopages.route_stopage', compact('route_stopages', 'bus_routes', 'stopages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'route_id' => $request->route_id,
            'stopage_id' => $request->stopage_id,
            'order' => $request->order,
        ];

        DB::table('route_stopages')->insert($data);

        $notify = [ 'message' => 'Route Stopage Added Successfully', 'alert-type' => 'success' ];
        return redirect()->back()->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'route_id' => $request->route_id,
            'stopage_id' => $request->stopage_id,
            'order' => $request->order,
        ];

        DB::table('route_stopages')->where('id', $id)->update($data);

        $notify = [ 'message' => 'Route Stopage Updated Successfully', 'alert-type' => 'success' ];
        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('route_stopages')->where('id', $id)->delete();

        $notify = [ 'message' => 'Route Stopage Deleted Successfully', 'alert-type' => 'success' ];
        return redirect()->back()->with($notify);
    }
}
