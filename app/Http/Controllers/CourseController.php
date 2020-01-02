<?php
    /**
     * Created by PhpStorm.
     * User: zelc10
     * Date: 4/7/2018
     * Time: 3:25 PM
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Major;
use App\User;

class CourseController extends Controller
{
    public function index(){
        
        $courses = Course::all();
        
        
        return view('courses.index', compact('courses'));
    }
    
    public function add(){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first() ||
            Auth::user()->roles()->where('title', 'Professor')->first())
        {
    
            request()->validate([
                'course_number' => 'required|max:4|min:4',
                'course_name' => 'required|min:2'
            ]);
    
            $selectMajor = request('major');
            $majorPick = Major::where('description', compact('selectMajor'))->firstOrFail();
    
            //$computing_major = Major::where('description', '=', 'CSCI')->firstOrFail();
    
            $course = new Course();
            $course->major_id = $majorPick->id;
            //$course->major_id = $computing_major->id;
            $course->course_number = request('course_number');
            $course->course_name = request('course_name');
            $course->save();
    
            session()->flash('confirmation', 'Successfully added course!');
            return redirect('/courses');
        }
        else{
    
            session()->flash('message', 'Only Administrators and Professors can add a course');
            return redirect('/courses');
        }
    }
    
    public function delete($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            Course::destroy($id);
    
            session()->flash('confirmation', 'Successfully deleted course!');
    
            return redirect('/courses');
        }
        else{
            session()->flash('message', 'Only Administrators can delete a course');
            return redirect('/courses');
        }
    }
    
    public function edit($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first() ||
            Auth::user()->roles()->where('title', 'Professor')->first())
        {
            $editCourse = Course::find($id);
    
            return view('courses.update', compact('editCourse'));
        }
        else{
            session()->flash('message', 'Only Administrators and Professors can update a course');
            return redirect('/courses');
        }
    }
    
    public function update($id){
    
        request()->validate([
            'course_number' => 'required|max:4|min:4',
            'course_name' => 'required|min:2'
        ]);
        
        $updCourse = Course::find($id);
        //$computing_major = Major::where('abbr', '=', 'CSCI')->firstOrFail();
    
        $selectMajor = request('major');
        $majorPick = Major::where('description', compact('selectMajor'))->firstOrFail();
        
        $course = new Course();
        $course->major_id = $majorPick->id;
        //$updCourse->major_id = $computing_major->id;
        $updCourse->course_number = request('course_number');
        $updCourse->course_name = request('course_name');
        $updCourse->save();
    
        $teaching = request('teacher');
        $updCourse->can_teach()->attach(User::where('first_name', compact('teaching'))->get());
        
    
        $attending = request('student');
        $classDate = request('date');
        $updCourse->attending_users()->attach(User::where('first_name', compact('attending'))->get());
        $updCourse->attending_users->date = $classDate;
        
        
        //$updCourse->is_teaching()->attach(User::where('first_name', 'teaching')->first(), array('start_date' => $classDate, 'end_date' => $classDate));
        $updCourse->is_teaching()->attach(User::where('first_name', compact('teaching'))->first(), array('start_date' => '2018-01-16', 'end_date' => '2018-05-03'));
        
        $updCourse->save();
        //$updCourse->save($is_teaching, ['end_date' => $classDate]);
    
    
        session()->flash('confirmation', 'Successfully updated course!');
        return redirect('/courses');
    }
    
    public function profile($id){
        
        $course = Course::with('can_teach')->find($id);
        //$course = Course::find($id);
        
        return view('/courses.profile', compact('course'));
    }
    
    
}
