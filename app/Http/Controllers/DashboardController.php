<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $id = Auth::id();
        $user = User::find($id);
        dd('dash');

        return view('student.dashboard' , compact('user'));
    }
    public function addProjectIdea(){
        $id = Auth::id();
        $user = User::find($id);
        return view('student.addProjectIdea' , compact('user'));
    }
}
