<?php

namespace App\Http\Controllers\Admin\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busses = DB::table('busses')
                ->leftjoin('bus_routes', 'busses.route_id', '=', 'bus_routes.id')
                ->leftjoin('users', 'busses.driver_id', '=', 'users.id')
                ->select('busses.*', 'bus_routes.label', 'users.name')
                ->get();
        $drivers = DB::table('users')->where('category', 'driver')->get();
        $routes = DB::table('bus_routes')->get();

        return view('admin.busses.index', compact('busses', 'drivers', 'routes'));
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
            'code_name' => ['required', 'unique:busses'],
            'capacity' => 'required',
            'liscence_number' => ['required', 'unique:busses'],
            'bus_category' => 'required',
            'driver_id' => 'required',
            'route_id' => 'required',
        ]);

        $data = [
            'code_name' => $request->code_name,
            'capacity' => $request->capacity,
            'liscence_number' => $request->liscence_number,
            'bus_category' => $request->bus_category,
            'driver_id' => $request->driver_id,
            'route_id' => $request->route_id,
            'is_active' => $request->is_active,
        ];

        DB::table('busses')->insert($data);

        $notify = [ 'message' => 'Bus Added Successfully', 'alert-type' => 'success' ];
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
        $validate = $request->validate([
            'code_name' => ['required', 'unique:busses,code_name,'.$id],
            'capacity' => 'required',
            'liscence_number' => ['required', 'unique:busses,liscence_number,'.$id],
            'bus_category' => 'required',
            'driver_id' => 'required',
            'route_id' => 'required',
        ]);

        $data = [
            'code_name' => $request->code_name,
            'capacity' => $request->capacity,
            'liscence_number' => $request->liscence_number,
            'bus_category' => $request->bus_category,
            'driver_id' => $request->driver_id,
            'route_id' => $request->route_id,
            'is_active' => $request->is_active,
        ];

        DB::table('busses')->where('id', $id)->update($data);

        $notify = [ 'message' => 'Bus Updated Successfully', 'alert-type' => 'success' ];
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
        DB::table('busses')->where('id', $id)->delete();

        $notify = [ 'message' => 'Bus Deleted Successfully', 'alert-type' => 'success' ];
        return redirect()->back()->with($notify);
    }
}
