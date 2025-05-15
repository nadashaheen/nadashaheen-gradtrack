<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectStage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProjectStageController extends Controller
{
    public function viewDetails_super($id)
    {
        $supervisor_id = Auth::user()->id; // أو Auth::user()->id;

        $submissions = DB::table('submissions')
            ->join('project_stages', 'submissions.stage_id', '=', 'project_stages.id')
            ->join('projects', 'project_stages.project_id', '=', 'projects.id')
            ->where('projects.supervisor_id', $supervisor_id)
            ->select('submissions.*', 'projects.title as project_title')
            ->latest('submissions.created_at')
            ->get();

        $student = DB::table('users')
            ->where('id', $id)->first();  // أو اسم عمود رقم المشروع حسب جدولك

        $project = DB::table('projects')
            ->where('student_id', $id)->first();
        // أو اسم عمود رقم المشروع حسب جدولك
        $final_project = DB::table('final_projects')
            ->where('student_id', $id)
            ->first();

        $evaluated_project = DB::table('evaluations')->where('project_id', $project->id)->first();

        $stage = DB::table('project_stages')
            ->where('project_id', $project->id)
            ->first();


        return view('supervisor.projectreview', compact('submissions' , 'project', 'final_project', 'student', 'evaluated_project', 'stage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_id = Auth::user()->id;

        // الأفضل استخدام where مباشرة بدون all() لفعالية الاستعلام
        $project = Project::where('student_id', $student_id)->first(); // استخدم first() إذا كان لكل طالب مشروع واحد فقط
        if (!$project) {
            return redirect()->back()->with('error', 'No project found for this student.');
        }
        $stage = DB::table('project_stages')
            ->where('project_id', $project->id)
            ->first();

        return view('student.projectdetail', compact('project', 'stage'));

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
        //
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
    public function update(Request $request, $id)
    {
        $phases = [
            'Idea & Research Phase',
            'Documentation Phase',
            'UI/UX Phase',
            'Frontend Phase',
            'Backend Phase',
        ];

        $stage = ProjectStage::findOrFail($id);

        $currentIndex = array_search($stage->status, $phases);

        if ($currentIndex !== false && $currentIndex < count($phases) - 1) {
            $stage->status = $phases[$currentIndex + 1];
            $stage->save();

            return redirect()->back()->with('success', 'تم الانتقال للمرحلة التالية بنجاح.');
        } elseif ($currentIndex === count($phases) - 1) {
            return redirect()->back()->with('info', 'المشروع بالفعل في آخر مرحلة.');
        }

        return redirect()->back()->with('error', 'حدث خطأ في تحديد المرحلة الحالية.');
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
