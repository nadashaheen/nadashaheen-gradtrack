<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisorId = Auth::user()->id;

        // جلب المشاريع الخاصة بالمشرف الحالي
        $projects = DB::table('projects')
            ->where('supervisor_id', $supervisorId)
            ->get();

        // جلب الاجتماعات الخاصة بالمشرف فقط من خلال ربطها بالمشاريع
        $meetings = DB::table('meetings')
            ->join('projects', 'meetings.project_id', '=', 'projects.id')
            ->where('projects.supervisor_id', $supervisorId)
            ->select('meetings.*', 'projects.title as project_name')
            ->orderByDesc('meetings.meeting_date')
            ->paginate(5);

        return view('supervisor.schedulemeetings', compact('meetings', 'projects'));
    }


    public function show_meeting_std()
    {
        $project = DB::table('projects')
            ->where('projects.student_id', Auth::user()->id)
            ->first();
        $meetings = '' ;
        $meetings_left = '';
if ($project){
    $meetings = Meeting::orderByDesc('meeting_date')->where('project_id' , $project->id)->where('meeting_date', '>', now())->paginate(5);
    $meetings_left = Meeting::orderByDesc('meeting_date')->where('project_id' , $project->id) ->where('meeting_date', '<', now())->paginate(5);

}


        // $meetings = Meeting::orderByDesc('meeting_date')->paginate(5);
        return view('student.meetings', compact('meetings' , 'project' , 'meetings_left'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['title' => 'required|max:50|min:4',
            'meeting_date' => 'required|date',
            'meeting_time' => 'required',
            'meeting_link' => 'required',
            'project_id' => 'required',
        ];

        $masseges = [
            'title.required' => 'title must be entered',
            'title.min' => 'title must be more than 3',
            'title.max' => 'title must less than 25',
            'meeting_date.required' => 'date must be entered',
            'meeting_time.required' => 'time must be entered',
            'meeting_link.required' => 'link must be entered',
            'project_id.required' => 'project must be selected',

        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $meeting = new Meeting();
        $meeting->title = $request->title;
        $meeting->meeting_date = $request->meeting_date;
        $meeting->meeting_time = $request->meeting_time;
        $meeting->meeting_link = $request->meeting_link;
        $meeting->project_id = $request->project_id;

        $meeting->save();

        return redirect()->route('meetings.index')->with('success', 'Meeting Added Successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id); // ✅ جلب الاجتماع أولاً

        $meeting->delete();
        return redirect()->route('meetings.index')->with('success', 'Meeting Deleted Successfully');

    }
}
