<?php

namespace App\Http\Controllers\Admin\Stopages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StopageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stopages = DB::table('stopages')->get();

        return view('admin.stopages.stopage_list', compact('stopages'));
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
            'Label' => $request->label,
            'map_location' => $request->map_location,
            'description' => $request->description,
        ];

        DB::table('stopages')->insert($data);

        $notify = [ 'message' => 'Stopage Added Successfully', 'alert-type' => 'success' ];
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
            'Label' => $request->label,
            'map_location' => $request->map_location,
            'description' => $request->description,
        ];

        DB::table('stopages')->where('id', $id)->update($data);

        $notify = [ 'message' => 'Stopage Updated Successfully', 'alert-type' => 'success' ];
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
        DB::table('stopages')->where('id', $id)->delete();

        $notify = [ 'message' => 'Stopage Deleted Successfully', 'alert-type' => 'success' ];
        return redirect()->back()->with($notify);
    }
}
