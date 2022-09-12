<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = DB::table('schedules')->get();

        return view('admin.schedule.index', compact('schedules'));
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
            'day' => $request->day,
            'arrival_time' => $request->arrival_time,
            'departure_time' => $request->departure_time,
        ];

        DB::table('schedules')->insert($data);

        $notify = [ 'message' => 'Schedule created successfully', 'alert-type' => 'success' ];
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
            'day' => $request->day,
            'arrival_time' => $request->arrival_time,
            'departure_time' => $request->departure_time,
        ];

        DB::table('schedules')->where('id', $id)->update($data);

        $notify = [ 'message' => 'Schedule updated successfully', 'alert-type' => 'success' ];
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
        DB::table('schedules')->where('id', $id)->delete();

        $notify = [ 'message' => 'Schedule deleted successfully', 'alert-type' => 'success' ];
        return redirect()->back()->with($notify);
    }
}
