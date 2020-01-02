<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class User extends Authenticatable

//class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function user_roles(){
        
        return $this->hasMany('App\Role', 'id');
    }
    
    public function roles(){
        
        return $this->belongsToMany('App\Role', 'role_users');
    }
    
    public function teaches(){
        
        return $this->belongsToMany('App\Course', 'can_teach_courses');
    }
    
    public function teaching(){
        
        return $this->belongsToMany('App\Course', 'is_teaching_courses')->withPivot('start_date', 'end_date');
    }
    
    public function attended(){
        
        return $this->belongsToMany('App\Course', 'attending_users')->withPivot('date');
    }
    
    /*public function role(){
        
        return $this->belongsTo('App\User', 'role_users', 'id');
    }*/
    
}
