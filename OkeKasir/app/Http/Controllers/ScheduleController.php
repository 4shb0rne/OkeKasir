<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    function opencatatan(){
        $user = Auth::user()->id;
        $notes = Schedule::query()->where('userid', 'LIKE', $user)->get();
        return view('catatan', ['notes'=>$notes]);
    }

    function openaddcatatan(){
        return view('addcatatan');
    }

    function addcatatan(Request $request)
    {
        $insert = Schedule::create([
            'scheduleTitle'=>$request->scheduleTitle,
            'scheduledescription'=>$request->scheduledescription,
            'staffname'=>$request->staffname,
            'schedulestatus'=>$request->schedulestatus,
            'scheduledate'=>$request->scheduledate,
            'userid' => Auth::user()->id
        ]);
        return redirect('/catatan');
    }

    function deleteschedule($id)
    {
        $notes = Schedule::find($id)->delete();
        return redirect('/catatan');
    }

    function openeditcatatan($id){
        $notes = Schedule::find($id);
        return view('editcatatan',['notes'=>$notes]);
    }

    function editcatatan(Request $request,$id)
    {
        $datas = $request->all();
        $notes = Schedule::where('id',"=",$id)->update([
            'scheduleTitle'=>$request->scheduleTitle,
            'scheduledescription'=>$request->scheduledescription,
            'staffname'=>$request->staffname,
            'schedulestatus'=>$request->schedulestatus,
            'scheduledate'=>$request->scheduledate
        ]);
        return redirect('/catatan');
    }
}

