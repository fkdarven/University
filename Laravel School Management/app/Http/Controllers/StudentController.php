<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $students = User::where('is_admin',0)->paginate(15);
        return view('students/index',['students' => $students]);
    }
    public function update(Request $request, $id)
    {
    	if((auth()->user()->is_admin==1))
    	{
	        $course = User::findOrFail($id);
	        $course->is_admin = 1;
	        $course->save();
            
	        \Session::flash('status', 'Usuário transformado em administrador !');
        	return redirect('/students');
    	}
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/students');
    }
}
