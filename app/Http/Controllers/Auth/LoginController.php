<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function checkIfLogin(){
        $user = Auth::user();

        if (Auth::check() && $user->role === 'student'){
//dd($user->role);
            return view('student.dashboard');

        }elseif (Auth::check() && $user->role === 'supervisor'){
//            dd($user->role);
            return view('supervisor.supervisor');
        }else{
            return view('index');
        }
    }


    public function showLoginForm()
    {
        $user = Auth::user();

        if (Auth::check() && $user->role === 'student'){
            return view('student.dashboard');

        }elseif (Auth::check() && $user->role === 'supervisor'){
            return view('supervisor.supervisor');
        }else{
            return view('login');
        }


    }


    public function login(Request $request)
    {
        $credentials = $request->only('stdNo', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Redirect based on role
            if ($user->role === 'student') {
                return view('student.dashboard');
            } elseif ($user->role === 'supervisor') {
                return view('supervisor.supervisor');
            }
        }

        return back()->withErrors(['stdNo' => 'Invalid credentials']);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('student')) {
            return redirect('/student/dashboard');
        } elseif ($user->hasRole('supervisor')) {
            return redirect('/supervisor/supervisor');
        } else {
            return abort(403, 'Unauthorized');
        }
    }

//    public function login(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//            $user = Auth::user();
//
//            if ($user->hasRole('student')) {
//                return redirect('/dashboards/student');
//            } elseif ($user->hasRole('supervisor')) {
//                dd('in');
////                return redirect('/dashboards/supervisor');
//
//            }else{
//                dd('nnn');
//            }
//
//        }
//
//        return back()->withErrors(['email' => 'البيانات غير صحيحة']);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
