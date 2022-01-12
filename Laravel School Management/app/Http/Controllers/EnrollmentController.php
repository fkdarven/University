<?php

namespace App\Http\Controllers;

use Notification;
use Illuminate\Http\Request;
use App\User;
use App\Enrollment;
use App\Course;
use App\Http\Requests\EnrollmentRequest;
use App\Notifications\PendingAuthorisation;
use App\Notifications\EnrollmentAuthorisationGranted;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function studentIndex()
    {
        if(auth()->user()->is_admin==0)
        {
            \Session::flash('status', 'Você não tem permissão para acessar essa área !');
            return redirect('/enrollments');
        }
        $students = User::where('is_admin',0)->get();
        
        return view('enrollments/index',['students'=> $students]);   
    }
    public function index()
    {
        $students = User::find((auth()->user()->id));
        return view('enrollments/enrollment',['students'=> $students]);
    }
    public function store(EnrollmentRequest $request)
    {
       $enrollment = new Enrollment;
       $enrollment->student_id = auth()->user()->id;
       $course_id = $request->input('id');
       $enrollment->course_id = $request->input('id');
       $course = Course::findOrFail($course_id);
       if($enrollment->save())
       {
            $course = Course::findOrFail($course_id); 
            $course->max_students-=1;
            $course->save();
            // auth()->user()->notify(new PendingAuthorisation ($course->name));
            $admins = User::where('is_admin',1)->get();
            foreach ($admins as $admin) 
            {
                $admin->notify(new PendingAuthorisation($course->name));
            }   
            \Session::flash('status', 'Matrícula em estado de aprovação !');
            return redirect('/enrollments');
        }
        else
        {
        \Session::flash('status', 'Falha ao efetuar a matrícula !');
        return redirect('/courses');
    }
}
    public function showInactivate()
    {
        if(auth()->user()->is_admin==0)
        {
            \Session::flash('status', 'Você não tem permissão para acessar essa área !');
            return redirect('/enrollments');
        }
        $users = User::where('is_admin','0');
        $enrollments = Enrollment::select('student_id');
        $students = User::whereIn('id', $enrollments)->paginate(15);
        return view ('enrollments/activate_enrollments',['students' => $students]);
    }
    public function update($id)
    {
        if(auth()->user()->is_admin==0)
        {
            \Session::flash('status', 'Você não tem permissão para acessar essa área !');
            return redirect('/enrollments');
        }

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->is_authorised = true;
        $enrollment->save();
        $student = User::find($enrollment->student_id);
        $course = Course::find($enrollment->course_id);
        $student->notify(new EnrollmentAuthorisationGranted($course->name));
        $user = auth()->user();
        \Session::flash('status', 'Matrícula aprovada !');
        return redirect('/enrollments/activate_enrollments');
    }
    public function destroy($id)
    {
        if((auth()->user()->is_admin==1))
        {
            $enroll = Enrollment::findOrFail($id);
            $enroll->delete();
            \Session::flash('status', 'Matrícula deletada com sucesso.');
            return redirect('/enrollments/enrollment');
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return back();
        

    }
}
