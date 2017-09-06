<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LecturerSubject;
use App\Assessment;
use App\Student;
use App\StudentSubject;
use App\StudentAssessment;
use App\User;
use App\Subject;

use Auth;
use DB;

class ParentController extends Controller
{
    #Lecturer Index
    public function index(){
        $parent_id = Auth::user()->id;

        $student = User::select('student_id')
                        ->where('users.id', $parent_id)
                        ->first();

        $student_id = $student->student_id;

        $semesters = StudentSubject::select('subjects.semester')
                                    ->join('subjects', 'subjects.id', '=', 'student_subjects.subject_id')
                                    ->where('student_subjects.student_id', $student_id)
                                    ->groupBy('subjects.semester')
                                    ->orderBy('subjects.semester', 'ASC')
                                    ->get();

        return view('parent.index', compact('semesters'));
    }

    #List of subject
    public function showSubject($semester_no){
        $parent_id = Auth::user()->id;

        $parent_id = Auth::user()->id;

        $student = User::select('student_id')
                        ->where('users.id', $parent_id)
                        ->first();

        $student_id = $student->student_id;

        $subjects = StudentSubject::select('subjects.*')
                                    ->join('subjects', 'subjects.id', '=', 'student_subjects.subject_id')
                                    ->where('student_subjects.student_id', $student_id)
                                    ->where('subjects.semester', $semester_no)
                                    ->get();

        return view('parent.subject_list', compact('subjects'));
    }

    #List of assessment
    public function showAssessment($subject_id){
        $parent_id = Auth::user()->id;

        $parent_id = Auth::user()->id;

        $student = User::select('student_id')
                        ->where('users.id', $parent_id)
                        ->first();

        $student_id = $student->student_id;

        $subject = Subject::where('id', $subject_id)->first();

        $assessments = Assessment::select('assessments.assessment_name', 'student_assessments.marks')
                                    ->join('student_assessments', 'assessments.id', '=', 'student_assessments.assessment_id')
                                    ->where('student_assessments.student_id', $student_id)
                                    ->where('assessments.subject_id', $subject_id)
                                    ->get();

        return view('parent.assessment_list', compact('subject', 'assessments'));
    }
}
