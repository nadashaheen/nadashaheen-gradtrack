<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboardStd() {
        $id = Auth::user()->id;
        $user = User::find($id);
        $project = DB::table('projects')->where('student_id', $id)->first();
        $stages = [
            'Idea & Research Phase',
            'Documentation Phase',
            'UI/UX Phase',
            'Frontend Phase',
            'Backend Phase'
        ];
        $progress = '';
        if ($project){

// اجلب المرحلة الحالية من الجدول
            $currentStage = DB::table('project_stages')
                ->where('project_id', $project->id)
                ->orderByDesc('id') // نفترض أن آخر إدخال هو الأحدث
                ->value('status');

// حساب التقدم بناءً على موقع المرحلة الحالية
            $currentIndex = array_search($currentStage, $stages);
            $progress = $currentIndex !== false ? round((($currentIndex + 1) / count($stages)) * 100) : 0;

        }

        return view('student.dashboard' , compact('user' , 'project' ,'progress'));

    }
    public function addProjectIdea(){
        $studentId = Auth::user()->id;  // أو يمكن تعديلها حسب طريقة إدارة المستخدمين لديك

        // تحقق إذا كان المستخدم قد أضاف فكرة مشروع مسبقًا
        $projectExists = Project::where('student_id', $studentId)->exists();

        $id = Auth::id();
        $user = User::find($id);
        $supervisors = User::where('role' , 'supervisor')->get();
        return view('student.addProjectIdea' , compact('user' , 'supervisors' ,'projectExists'));
    }

    public function dashboardSuper() {
        $id = Auth::id();
        $user = User::find($id);
        return view('supervisor.allprojects' , compact('user'));
    }
}
