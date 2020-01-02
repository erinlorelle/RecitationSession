<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $fillable = ['title', 'description'];
    
    
    public function role_users(){
        
        return $this->hasMany('App\User');
    }
    
    public function users(){
        
        return $this->belongsToMany('App\User', 'role_users');
    }
    
    /*public function user(){
        
        return $this->belongsTo('App\User');
    }*/
}
