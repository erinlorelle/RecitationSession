<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{

    protected $fillable = ['abbr', 'name', 'description'];
    //protected $guarded = ['id'];  //not accessible
    
    public function courses(){
        
        return $this->hasMany('App\Course');
    }

}
