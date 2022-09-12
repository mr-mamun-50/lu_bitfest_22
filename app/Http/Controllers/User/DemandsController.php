<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'user_id' => Auth::user()->id,
            'stopage_id' => $request->stopage_id,
            'sat_arr_time' => $request->sat_arr_time,
            'sat_dep_time' => $request->sat_dep_time,
            'sun_arr_time' => $request->sun_arr_time,
            'sun_dep_time' => $request->sun_dep_time,
            'mon_arr_time' => $request->mon_arr_time,
            'mon_dep_time' => $request->mon_dep_time,
            'tue_arr_time' => $request->tue_arr_time,
            'tue_dep_time' => $request->tue_dep_time,
            'wed_arr_time' => $request->wed_arr_time,
            'wed_dep_time' => $request->wed_dep_time,
            'thu_arr_time' => $request->thu_arr_time,
            'thu_dep_time' => $request->thu_dep_time,
            'fri_arr_time' => $request->fri_arr_time,
            'fri_dep_time' => $request->fri_dep_time,
        ];

        DB::table('demands')->where('id', $id)->update($data);

        $notify = [ 'message' => 'Demand updated successfully', 'alert-type' => 'success' ];
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
        //
    }
}
