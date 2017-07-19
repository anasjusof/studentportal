<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    #return view('home.index');
    
        if(Auth::check()){
            if(Auth::user()->getRolesId() == 1){                // If roles id == 2, redirect to /dekan            
	      return redirect('admin');
	    }
	    if(Auth::user()->getRolesId() == 2){                // If roles id == 2, redirect to /dekan            
	      return redirect('lecturer');
	    }
	}
	else{
		return view('home.index');
	}
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('homepage', ['uses'=>'HomePageController@index'])->name('homepage.index');

Route::get('admin', ['uses'=>'AdminController@index'])->name('admin.index');

Route::get('admin-department', ['uses'=>'AdminController@department'])->name('admin.department');
Route::post('admin-department-create', ['uses'=>'AdminController@createDepartment'])->name('admin.createDepartment');
Route::patch('admin-department-update', ['uses'=>'AdminController@updateDepartment'])->name('admin.updateDepartment');
Route::delete('admin-department-delete', ['uses'=>'AdminController@deleteDepartment'])->name('admin.deleteDepartment');

Route::get('admin-subject', ['uses'=>'AdminController@showSubject'])->name('admin.showSubject');
Route::post('admin-subject-create', ['uses'=>'AdminController@createSubject'])->name('admin.createSubject');
Route::patch('admin-subject-update', ['uses'=>'AdminController@updateSubject'])->name('admin.updateSubject');
Route::delete('admin-subject-delete', ['uses'=>'AdminController@deleteSubject'])->name('admin.deleteSubject');

Route::get('admin-Course', ['uses'=>'AdminController@showCourse'])->name('admin.showCourse');
Route::post('admin-Course-create', ['uses'=>'AdminController@createCourse'])->name('admin.createCourse');
Route::patch('admin-Course-update', ['uses'=>'AdminController@updateCourse'])->name('admin.updateCourse');
Route::delete('admin-Course-delete', ['uses'=>'AdminController@deleteCourse'])->name('admin.deleteCourse');

Route::get('admin-user', ['uses'=>'AdminController@showUser'])->name('admin.showUser');
Route::post('admin-user-create', ['uses'=>'AdminController@createUser'])->name('admin.createUser');
Route::patch('admin-user-update', ['uses'=>'AdminController@updateUser'])->name('admin.updateUser');
Route::delete('admin-user-delete', ['uses'=>'AdminController@deleteUser'])->name('admin.deleteUser');

Route::get('lecturer', ['uses'=>'LecturerController@index'])->name('lecturer.index');