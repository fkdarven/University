<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function allCourses()
    {
        if(auth()->user()->is_admin==1)
        {
            $courses = Course::paginate(15);
            return view('courses/allcourses',['courses'=> $courses]);    
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/courses');
        
    }
    public function index()
    {
        $courses = Course::whereNotIn('id', (auth()->user())->courses->pluck('id'))->where('max_students','>','0')->paginate(15);
        return view('courses/index',['courses'=> $courses]);
    }
    public function create()
    {
        if((auth()->user()->is_admin==1))
        {
            return view('courses/new');    
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/courses');
    }
    public function store(CourseRequest $request)
    {
        $course = new Course;
        $course->name = $request->input('name');
        $course->total_time = $request->input('total_time');
        $course->description = $request->input('description');
        $course->max_students = $request->input('max_students');
        if($course->save())
        {
            \Session::flash('status', 'Curso cadastrado com sucesso !');
            return redirect('/courses');
        } 
        else 
        {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o curso !');
            return view('courses/new');
        }
    }
    public function edit($id)
    {
        if((auth()->user()->is_admin==1))
        {
            $course = Course::findOrFail($id);
            return view('courses/edit',['course' => $course]);
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/courses');
    }
    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->name = $request->input('name');
        $course->total_time = $request->input('total_time');
        $course->description = $request->input('description');
        $course->max_students = $request->input('max_students');
        $course->save();
        \Session::flash('status','Curso editado com sucesso !');
        return redirect('/courses');
    }
    public function destroy($id)
    {
        if((auth()->user()->is_admin==1))
        {
            $course = Course::findOrFail($id);
            $course->delete();
            \Session::flash('status', 'Curso deletado com sucesso.');
            return redirect('/courses');
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/courses');
    }

}
