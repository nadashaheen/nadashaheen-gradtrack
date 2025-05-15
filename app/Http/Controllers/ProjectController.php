<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Meeting;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reject($id)
    {
        Project::find($id)->delete();

        return redirect()->back()->with('success', 'reject request Successfully');

//        return redirect()->route('profile', $user)->with('success', 'your information Updated Successfully');

    }

    public function accept($id)
    {
        $user = Auth::user();
        $project = Project::find($id);
        $project->status = 'in_progress';
        $project->save();

        DB::table('project_stages')->insert([
            'project_id' => $project->id,
            'status'=> 'Idea & Research Phase',
            'name'=>'',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'accept request Successfully');

    }

    public function add_idea(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'projectTitle' => 'required|string|max:255',
            'projectDescription' => 'required|string|max:1000',
            'supervisor_id' => 'required|exists:users,id',
        ]);



        // إنشاء المشروع
        $project = new Project();
        $project->title = $validated['projectTitle'];
        $project->description = $validated['projectDescription'];
        $project->student_id = Auth::user()->id ; // تحديد الطالب الحالي
        $project->status = 'proposed';
        $project->supervisor_id =  $validated['supervisor_id'];
        // أو حسب النظام
        $project->save();

        return redirect()->back()->with('success', 'Project added successfully!');
    }


    public function show_projectDetils()
    {
        $student_id = Auth::user()->id;

        // الأفضل استخدام where مباشرة بدون all() لفعالية الاستعلام
        $project = Project::where('student_id', $student_id)->first(); // استخدم first() إذا كان لكل طالب مشروع واحد فقط
if (!$project){
    return redirect()->back()->with('error', 'No project found for this student.');
}

        return view('student.projectdetail', compact('project'));
    }

    public function filters(Request $request)
    {
        $gradeOrder = $request->input('grade_order'); // 'asc' أو 'desc'
        $supervisorId = Auth::user()->id;

        $projects = DB::table('projects')
            ->join('evaluations', 'projects.id', '=', 'evaluations.project_id')
            ->join('users', 'projects.student_id', '=', 'users.id')
            ->where('projects.supervisor_id', $supervisorId)
            ->where('projects.status', 'completed')
            ->orderBy('evaluations.score', in_array($gradeOrder, ['asc', 'desc']) ? $gradeOrder : 'asc')
            ->select(
                'projects.*',
                'evaluations.score as final_score',
                'evaluations.created_at as date',
                'users.name as student_name',
            )
            ->get();

        return view('supervisor.completedprojects', compact('projects'));
    }


//    public function filters(Request $request)
//    {
//
//        $gradeOrder = $request->input('grade_order'); // 'asc' أو 'desc'
//        $supervisorId = Auth::user()->id;
//
//
//
//        // استخدمي join مع جدول evaluations
//        $projects = Project::join('evaluations', 'projects.id', '=', 'evaluations.project_id')
//            ->where('projects.supervisor_id', $supervisorId)
//            ->where('projects.status', 'completed')
//            ->orderBy('evaluations.score', in_array($gradeOrder, ['asc', 'desc']) ? $gradeOrder : 'asc')
//            ->select('projects.*', 'evaluations.score as final_score' , 'evaluations.created_at as date')
//            ->with('student') // جلب بيانات الطالب إن أردتِ عرضها في الواجهة
//            ->get();
//
//        return view('supervisor.completedprojects', compact('projects'));
//    }



    public function do_search(Request $request)
    {
        $search = $request->input('search');



        // جلب معرفات الطلاب المطابقين
        $student_ids = DB::table('users')
            ->where('role', 'student')
            ->where('name', 'like', '%' . $search . '%')
            ->pluck('id');


        // جلب المشاريع + اسم الطالب + بيانات التقييم
        $projects = DB::table('projects')
            ->leftJoin('users', 'projects.student_id', '=', 'users.id')
            ->leftJoin('evaluations', 'projects.id', '=', 'evaluations.project_id')
            ->select(
                'projects.*',
                'evaluations.score as final_score',
                'evaluations.created_at as date',
                                'users.name as student_name',

            )
            ->where(function ($query) use ($search, $student_ids) {
                $query->where('projects.title', 'like', '%' . $search . '%')
                    ->orWhereIn('projects.student_id', $student_ids);
            })
            ->get();

        return view('supervisor.completedprojects', compact('projects'));
    }

    public function completedProj(){

        $supervisorId = Auth::user()->id;

        $projects = DB::table('projects')
            ->join('evaluations', 'projects.id', '=', 'evaluations.project_id')
            ->join('users', 'projects.student_id', '=', 'users.id')
            ->where('projects.supervisor_id', $supervisorId)
            ->where('projects.status', 'completed')
            ->select(
                'projects.*',
                'evaluations.score as final_score',
                'evaluations.created_at as date',
                'users.name as student_name',
            )
            ->get();

        return view('supervisor.completedprojects', compact('projects'));


//        // استخدمي join مع جدول evaluations
//        $projects = Project::join('evaluations', 'projects.id', '=', 'evaluations.project_id')
//            ->where('projects.supervisor_id', $supervisorId)
//            ->where('projects.status', 'completed')
//            ->select('projects.*', 'evaluations.score as final_score' , 'evaluations.created_at as date')
//            ->with('student') // جلب بيانات الطالب إن أردتِ عرضها في الواجهة
//            ->get();
//
//
//
//
//        return view('supervisor.completedprojects', compact( 'projects' ));
    }


    public function proposedProj(){

//        $projects = Auth::user()->projects()->where('status','proposed')->get();
        $projects = DB::table('projects')
            ->join('users', 'projects.student_id' , 'users.id')  // ربط جدول المشاريع مع جدول الطلاب
            ->where('projects.supervisor_id', Auth::user()->id)  // الحصول على المشاريع المرتبطة بالمستخدم الحالي
            ->where('projects.status', 'proposed')  // المشاريع المقترحة
            ->select('projects.id', 'projects.title', 'users.name as student_name' , 'status')  // تحديد الأعمدة المطلوبة
            ->get();


        return view('supervisor.proposedProj', compact( 'projects' ));
    }



    public function index()
    {
        $userId = Auth::user()->id;

        // جلب المشاريع المرتبطة بالمستخدم مع اسم الطالب
        $projects = DB::table('projects')
            ->join('users', 'projects.student_id', '=', 'users.id')
            ->where('projects.supervisor_id', $userId)
            ->select('projects.*', 'users.name as student_name','users.id as student_id', 'users.stdNo as student_number')
            ->get();

        // جلب الاجتماعات مع اسم المشروع
        $meetings = DB::table('meetings')
            ->join('projects', 'meetings.project_id', '=', 'projects.id')
            ->where('projects.supervisor_id', Auth::user()->id)
            ->orderByDesc('meeting_date')
            ->select('meetings.*', 'projects.title as project_title')
            ->paginate(5); // تأكد من أنك تستخدم paginator الصحيح في view




        return view('supervisor.allprojects', compact('projects', 'meetings'));
    }


//    public function index()
//    {
//        $projects = Auth::user()->projects()->with('student')->get();
//        $meetings = Meeting::orderByDesc('meeting_date')->with('project')->paginate(5);
//
//        return view('supervisor.allprojects', compact( 'projects' , 'meetings'));
//    }

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
        //
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
        //
    }
}
