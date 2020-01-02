<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
    
        return view('reports.index');
    }
    
    public function attended(){
    
        return view('reports.attended');
    }
    
    public function canTeach(){
    
        return view('reports.canTeach');
    }
    
    public function areTeaching(){
    
        return view('reports.areTeaching');
    }
    
    public function roleUsers(){
    
        return view('reports.roleUsers');
    }
    
    public function majorCourses(){
        
        return view('reports.majorCourses');
    }
    
    public function permissions(){
        
        return view('reports.permissions');
    }
}
