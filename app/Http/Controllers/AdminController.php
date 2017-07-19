<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;
use App\Subject;
use App\Course;
use App\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function department(){
    	$departments = Department::paginate(5);

        return view('admin.department', compact('departments'));
    }

    public function createDepartment(Request $request){
        $input = $request->all();
        
        Department::create($input);

        return redirect()->back();
    }

    public function updateDepartment(Request $request){
        $input = $request->all();
        
        $department = Department::find($request->id);
        
        $department->department_name = $input['name'];
        
        $department->save();
        
        return redirect()->back();
    }

    public function deleteDepartment(Request $request){
        $departments = Department::findOrFail($request->department_id);

		foreach($departments as $department){
    		$department->delete();
    	}

    	return redirect()->back();
    }

    public function showSubject(){
    	$subjects = Subject::paginate(5);

        return view('admin.subject', compact('subjects'));
    }

    public function createSubject(Request $request){
        $input = $request->all();
        
        Subject::create($input);

        return redirect()->back();
    }

    public function updateSubject(Request $request){
        $input = $request->all();
        
        $subject = Subject::find($request->id);
        
        $subject->subject_name = $input['name'];
        
        $subject->save();
        
        return redirect()->back();
    }

    public function deleteSubject(Request $request){
        $subjects = Subject::findOrFail($request->subject_id);

		foreach($subjects as $subject){
    		$subject->delete();
    	}

    	return redirect()->back();
    }

    public function showCourse(){
        $courses = Course::paginate(5);

        return view('admin.course', compact('courses'));
    }

    public function createCourse(Request $request){
        $input = $request->all();
        
        Course::create($input);

        return redirect()->back();
    }

    public function updateCourse(Request $request){
        $input = $request->all();
        
        $course = Course::find($request->id);
        
        $course->course_name = $input['name'];
        
        $course->save();
        
        return redirect()->back();
    }

    public function deleteCourse(Request $request){
        $courses = Course::findOrFail($request->course_id);

        foreach($courses as $course){
            $course->delete();
        }

        return redirect()->back();
    }

    public function showUser(){
        $users = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.user', compact('users'));
    }
    
    public function createUser(Request $request){
        $input = $request->except('password_confirmation');
        
        $input['password'] = bcrypt($request->password);
        
        User::create($input);

        return redirect()->back();
    }
    
    public function deleteUser(Request $request){
        $users = User::findOrFail($request->user_id);

		foreach($users as $user){
    		$user->delete();
    	}

    	return redirect()->back();
    }
    
    public function updateUser(Request $request){
        $input = $request->all();
        
        $user = User::find($request->id);
        
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->department = $input['department'];
        $user->roles = $input['roles'];
        
        $user->save();
        
        return redirect()->back();
    }

}
