<?php

namespace App\Http\Controllers\Admin\BusRoutes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BusRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = DB::table('bus_routes')->get();

        return view('admin.bus_routes.index', compact('routes'));
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
        $validate = $request->validate([
            'label' => 'required',
            'route_no' => ['required', 'unique:bus_routes'],
            'map_link' => 'required',
        ]);

        // dd($request->all());

        $data = [
            'label' => $request->label,
            'route_no' => $request->route_no,
            'map_link' => $request->map_link,
        ];

        DB::table('bus_routes')->insert($data);

        $notify = ['message' => 'Bus Route Added Successfully', 'alert-type' => 'success'];
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
            'label' => $request->label,
            'route_no' => $request->route_no,
            'map_link' => $request->map_link,
        ];

        DB::table('bus_routes')->where('id', $id)->update($data);

        $notify = ['message' => 'Bus Route Updated Successfully', 'alert-type' => 'success'];
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
        DB::table('bus_routes')->where('id', $id)->delete();

        $notify = ['message' => 'Bus Route Deleted Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }
}
