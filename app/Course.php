<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $fillable = ['major_id', 'course_number', 'course_name'];
    
    
    public function attending_users(){
        
        return $this->belongsToMany('App\User', 'attending_users')->withPivot('date');
    }
    
    public function can_teach(){
        
        return $this->belongsToMany('App\User', 'can_teach_courses');
    }
    
    public function is_teaching(){
        
        return $this->belongsToMany('App\User','is_teaching_courses')->withPivot('start_date', 'end_date');
    }
    
    public function major(){
        
        return $this->belongsTo('App\Major');
    }
}
