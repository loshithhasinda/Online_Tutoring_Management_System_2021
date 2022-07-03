<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;
use App\Http\Requests\TimetableRequest;
use Auth;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all time table shedule. 
        $timetables = TimeTable::all();
        
        return view('/timetable/timetable', compact(['timetables']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return new timetable create view
        return view('/timetable/create_timetable');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimetableRequest $request)
    {
        // all validations are coded inside TimetableRequest file. 
        // path -> App\Http\Requests\TimetableRequest;

        // save timtable data
        $storeTimetable = TimeTable::create([
            'lecturer'    => $request->lecturer,
            'title'       => $request->title,
            'description' => $request->description,
            'date'        => $request->date,
            'time'        => $request->time,
            // 'created_by'  => Auth::user()->id // un comment this when you connected with auth route
        ]);

        session()->flash('success', 'Succesfully created!'); // show success messaage
        return redirect()->back(); // redirect to previous page
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
        $timetable = TimeTable::findOrFail($id);

        return view('/timetable/edit_timetable', compact(['timetable']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimetableRequest $request, $id)
    {
        $timetable = TimeTable::findOrFail($id);

        $timetable->update([
            'lecturer'    => $request->lecturer,
            'title'       => $request->title,
            'description' => $request->description,
            'date'        => $request->date,
            'time'        => $request->time,
        ]);

        session()->flash('success', 'Succesfully updated!'); // show success messaage
        return redirect()->back(); // redirect to previous page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = TimeTable::findOrFail($id)->delete();

        session()->flash('success', 'Succesfully deleted!'); // show success messaage
        return redirect()->back(); // redirect to previous page
    }

    public function getReport(Request $request){

        $timetables = TimeTable::paginate(10);

        return view('/timetable/report', compact(['timetables']));
    }
}
