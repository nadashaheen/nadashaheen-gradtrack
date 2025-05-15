<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $student = DB::table('users')
            ->where('id', $id)->first();  // أو اسم عمود رقم المشروع حسب جدولك

        $project = DB::table('projects')
            ->where('student_id', $id)->first();

        $evaluated_project = DB::table('evaluations')->where('project_id', $project->id)->first();

        $stage = DB::table('project_stages')
            ->where('project_id', $project->id)
            ->first();

        $lastSubmission =     DB::table('submissions')->where('student_id', $id)->orderBy('id', 'desc')->get();

        //        $lastSubmission = Submission::where('student_id', $id)
//            ->orderBy('id', 'desc') ->take(3)
//            ->get();


        return view('student.projectstage', compact('project', 'lastSubmission', 'evaluated_project', 'stage'));

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_path' => 'required|file|mimes:pdf,doc,docx,zip|max:10240', // حسب أنواع الملفات المسموحة
        ]);

        $student_id = Auth::user()->id;

        $project = Project::where('student_id', $student_id)->first();

        if (!$project) {
            return response()->json(['message' => 'No project found for this student.']);
        }

        $stage = DB::table('project_stages')
            ->where('project_id', $project->id)
            ->first();

        $file_path = '';

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName(); // اسم ملف مميز
            $file->move(public_path('submission/'), $filename); // حفظ الملف في public/finalprojects
            $file_path = 'submission/' . $filename; // حفظ المسار لاستخدامه لاحقًا
        }

        // إدخال المسار في جدول الملفات المرتبطة بالمشروع
        DB::table('submissions')->insert([
            'student_id' => $student_id,
            'stage_id' => $stage->id,
            'file_path' => $file_path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'تم رفع الملفات بنجاح.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $status = $request->status ;

        DB::table('submissions')->where('id', $id)->update([
            'status' => $status ,
            'updated_at' => now(),

        ]);

        return redirect()->back()->with('success', 'Submission status updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
