<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Major;

class MajorController extends Controller
{
    public function index(){

        $majors = Major::all();

        return view('majors.index', compact('majors'));
        //return view('layouts.master', compact('majors'));
    }
    
    public function add(){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            request()->validate([
                'abbr' => 'required|min:4|max:4',
                'name' => 'required|min:2',
                'description' => 'required|min:4'
            ]);
    
            $major = new Major();
            $major->abbr = request('abbr');
            $major->name = request('name');
            $major->description = request('description');
            $major->save();
    
            session()->flash('confirmation', 'Successfully added major!');
            return redirect('/majors');
        }
        else{
    
            session()->flash('message', 'Only Administrators can add a major');
            return redirect('/majors');
        }
    }
    
    public function delete($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            Major::destroy($id);
    
            session()->flash('confirmation', 'Successfully deleted major!');
    
            return redirect('/majors');
        }
        else{
    
            session()->flash('message', 'Only Administrators can delete a major');
            return redirect('/majors');
        }
    }
    
    public function edit($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            $editMajor = Major::find($id);
    
            return view('majors.update', compact('editMajor'));
        }
        else{
    
            session()->flash('message', 'Only Administrators can update a major');
            return redirect('/majors');
        }
    }
    
    public function update($id){
    
        request()->validate([
            'abbr' => 'required|min:4|max:4',
            'name' => 'required|min:2',
            'description' => 'required|min:4'
        ]);
        
        $updMajor = Major::find($id);
    
        $updMajor->abbr = request('abbr');
        $updMajor->name = request('name');
        $updMajor->description = request('description');
        $updMajor->save();
        
        session()->flash('confirmation', 'Successfully updated major!');
        return redirect('/majors');
    }
    
}
