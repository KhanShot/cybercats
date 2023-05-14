<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $lessons = Subject::query()->get();
        return view('admin.index', compact('lessons'));
    }

}
