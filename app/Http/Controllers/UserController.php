<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;


class UserController extends Controller
{
    public function index(){
    
        //$users = User::all();
        $users = User::paginate(9);
        //return $users;
    
        return view('users.index', compact('users'));
        
    }
    
    public function add(){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first() ||
            Auth::user()->roles()->where('title', 'Professor')->first())
        {
    
            request()->validate([
                'first_name' => 'required|min:2',
                'last_name' => 'required|min:2',
                'email' => 'email|required|unique:users,email'
            ]);
    
            $user = new User();
            $user->first_name = request('first_name');
            $user->last_name = request('last_name');
            $user->email = request('email');
    
            $user->save();
    
            //$user->roles()->attach(Role::where('title', 'Student')->get());
    
            $role = request('title');
            $user->roles()->attach(Role::where('title', compact('role'))->get());
    
            session()->flash('confirmation', 'Successfully added user!');
            return redirect('/users');
        }
        else{
            
            session()->flash('message', 'Only Administrators and Professors can add a user');
            return redirect('/users');
        }
    }
    
    public function delete($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
    
            User::destroy($id);
    
            session()->flash('confirmation', 'Successfully deleted user!');
    
            return redirect('/users');
        }
        else{
    
            session()->flash('message', 'Only Administrators can delete a user');
            return redirect('/users');
        }
        
    }
    
    public function edit($id){
    
        if(Auth::user()->roles()->where('title', 'Admin')->first())
        {
            $editUser = User::find($id);
            return view('users.update', compact('editUser'));
        }
        else{
    
            session()->flash('message', 'Only Administrators can update a user');
            return redirect('/users');
        }
    }
    
    public function update($id){
    
        request()->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'email|required'
        ]);
        
        $updUser = User::find($id);
    
        $updUser->first_name = request('first_name');
        $updUser->last_name = request('last_name');
        $updUser->email = request('email');
        $updUser->save();
    
        $roleU = request('title');
        $updUser->roles()->attach(Role::where('title', compact('roleU'))->get());
    
        session()->flash('confirmation', 'Successfully updated user!');
        return redirect('/users');
    }
    
    public function registerPage(){
    
        return view('register');
    }
    
    public function register(){
        
        request()->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed'
        ]);
    
        $reg_user = new User();
        $reg_user->first_name = request('first_name');
        $reg_user->last_name = request('last_name');
        $reg_user->email = request('email');
    
        $reg_user->save();
    
        $reg_user->roles()->attach(Role::where('title', 'Student')->get());
        
        //session()->flash('confirmation', 'User Successfully Registered!');
        Auth::login($reg_user);
        return redirect('/home');
        
    }
    
    public function profile($id){
    
        $user = User::with('user_roles')->find($id);
        //$user = User::find($id);
        //$role = Role::with('users')->get();
        
        return view('/users.profile', compact('user'));
    }
}
