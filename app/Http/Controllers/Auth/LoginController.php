<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function show(){
        
        return view('login');  // what's this?
    }
    
    public function auth(){
        
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $ldap = ldap_connect('ldap://etsu.edu');
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        $username = explode('@', request('email'));
        
        if($ldap){
            
            $status = @ldap_bind($ldap, $username[0] . "@ETSU", request('password'));
            $user = User::where('email', request('email'))->first();
            
            if(/*$status && */$user)
            {
                ldap_unbind($ldap);
                Auth::login($user);
                return redirect('/home');
            }
            else{
                return redirect('/login');
            }
        }
    }
    
    public function logout(){
        
         /*I love the below commented code, but it's not practical for the user to log out and his name
           be displayed for future users*/
         //session()->flash('logout', auth()->user()->first_name . ', thank you for visiting!');
        
         Auth::logout();
         session()->flash('logout', 'Successfully Logged Out!');
    
         return redirect('/login');
    }
}
