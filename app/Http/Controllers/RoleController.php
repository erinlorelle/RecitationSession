<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Role;

class RoleController extends Controller
{
    public function index(){
        
        $roles = Role::all();
        
        
        return view('roles.index', compact('roles'));
    }
    
    public function add(){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            request()->validate([
                'title' => 'required|min:2',
                'description' => 'required|min:4'
            ]);
            
            $role = new Role();
            $role->title = request('title');
            $role->description = request('description');
            $role->save();
    
            session()->flash('confirmation', 'Successfully added role!');
            return redirect('/roles');
        }
        else{
    
            session()->flash('message', 'Only Administrators can add a role');
            return redirect('/roles');
        }
    }
    
    public function delete($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            Role::destroy($id);
    
            session()->flash('confirmation', 'Successfully deleted role!');
    
            return redirect('/roles');
        }
        else{
    
            session()->flash('message', 'Only Administrators can delete a role');
            return redirect('/roles');
        }
    }
    
    public function edit($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            $editRole = Role::find($id);
    
            return view('roles.update', compact('editRole'));
        }
        else{
    
            session()->flash('message', 'Only Administrators can update a role');
            return redirect('/roles');
        }
    }
    
    public function update($id){
    
        request()->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:4'
        ]);
        
        $updRole = Role::find($id);
    
        $updRole->title = request('title');
        $updRole->description = request('description');
        $updRole->save();
    
        session()->flash('confirmation', 'Successfully updated role!');
        
        return redirect('/roles');
    }
}
