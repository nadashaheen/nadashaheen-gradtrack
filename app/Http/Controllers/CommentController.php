<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showComments($id)
    {
        // التأكد أن التسليم موجود
        $submission = Submission::findOrFail($id);

        // جلب التعليقات التي كتبها الموجهون لهذا التسليم
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.submission_id', $id)
            ->select('comments.*', 'users.name as user_name', 'users.role as user_role')
            ->orderBy('comments.created_at', 'desc')
            ->get();
        return view('supervisor.comments', compact('submission' , 'comments'));
    }

    public function showComments_std($id)
    {
        // التأكد أن التسليم موجود
        $submission = Submission::findOrFail($id);

        // جلب التعليقات التي كتبها الموجهون لهذا التسليم
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.submission_id', $id)
            ->select('comments.*', 'users.name as user_name', 'users.role as user_role')
            ->orderBy('comments.created_at', 'desc')
            ->get();
        return view('student.comments', compact('submission' , 'comments'));
    }

    public function index()
    {

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

        // تحقق من البيانات المدخلة
        $validated = $request->validate([
            'submission_id' => 'required|exists:submissions,id',
            'content' => 'required|string|max:5000',
        ]);

        // إنشاء التعليق
        Comment::create([
            'submission_id' => $validated['submission_id'],
            'user_id' => Auth::user()->id,
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Comment added successfully.');
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
