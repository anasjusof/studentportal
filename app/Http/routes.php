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
Route::get('lecturer', ['uses'=>'LecturerController@index'])->name('lecturer.index');