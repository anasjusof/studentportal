<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LecturerController extends Controller
{
    public function index(){
        return "Hi im Lecturer";
    }
}
