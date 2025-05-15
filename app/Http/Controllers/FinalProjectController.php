<?php

namespace App\Http\Controllers;

use App\Models\ProjectStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinalProjectController extends Controller
{
    public function show_add_final()
    {
        $student_id = Auth::user()->id;  // أو يمكن تعديلها حسب طريقة إدارة المستخدمين لديك
        $project_final = DB::table('final_projects')->where('student_id', $student_id)->first();
        $file_path = '';

        if ($project_final) {
            $file_path = $project_final->pdf_file;
        }
        $project = DB::table('projects')
            ->where('student_id', $student_id)->first();
        // أو اسم عمود رقم المشروع حسب جدولك
        $project_id = '';
        $stage = '';
        $evaluation = '';
        if ($project){
            $project_id = $project->id;

            $evaluation = DB::table('evaluations')
                ->where('project_id', $project_id)
                ->first();

            $stage = ProjectStage::where('project_id', $project_id)->first();

        }


        return view('student.finalproject', compact('file_path', 'project' , 'evaluation' , 'stage' , 'project_final'));
    }

    public function add_final(Request $request)
    {
        $request->validate([
            'file_path' => 'required|file|mimes:pdf,doc,docx,zip|max:10240', // حسب أنواع الملفات المسموحة
        ]);

        $student_id = Auth::user()->id;

        $supervisor_id = DB::table('projects')
            ->where('student_id', $student_id)
            ->value('supervisor_id');


        $file_path = '';

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName(); // اسم ملف مميز
            $file->move(public_path('finalprojects/'), $filename); // حفظ الملف في public/finalprojects
            $file_path = 'finalprojects/' . $filename; // حفظ المسار لاستخدامه لاحقًا
        }

        // إدخال المسار في جدول الملفات المرتبطة بالمشروع
        DB::table('final_projects')->insert([
            'student_id' => $student_id,
            'supervisor_id' => $supervisor_id,
            'pdf_file' => $file_path,

        ]);



        return back()->with('success', 'تم رفع الملفات بنجاح.');
    }

    public function evaluate_final_project(Request $request){

        $project_id = $request->project_id ;
        $supervisor_id = Auth::user()->id;
        $score = $request->score;
        $feedback = $request->feedback;

        DB::table('evaluations')->insert([
            'project_id' => $project_id,
            'supervisor_id' => $supervisor_id,
            'score' => $score,
            'feedback' => $feedback,

        ]);
        return back()->with('success', 'evaluated successfully');

    }

//    public function add_final(Request $request){
//        $student_id = Auth::user()->id ;
//
//
//        $supervisor_id = DB::table('projects')
//            ->where('student_id', $student_id)
//            ->value('supervisor_id');
//
//        $request->validate([
//            'files' => 'required|max:10240', // 10MB max
//        ]);
//        foreach ($request->file('files') as $file) {
//            $paths[] = $file->store('final_projects', 'public');
//        }
//
//        FinalProject::create([
//            'student_id' => $student_id,
//            'supervisor_id' => $supervisor_id,
//            'file_paths' => json_encode($paths),
//        ]);
//
//        return redirect()->back()->with('success', 'Final project uploaded successfully.')->compact('filePath');
//
//    }
}
