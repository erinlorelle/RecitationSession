<?php
    /**
     * Created by PhpStorm.
     * User: Erin Lorelle
     * Date: 4/7/2018
     * Time: 3:25 PM
     */
    
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $computing_major = App\Major::where('abbr', '=', 'CSCI')->firstOrFail();
        
        $this->createCourse($computing_major,"2910", "Server Side Web Programming");
        $this->createCourse($computing_major,"2150", "Computer Organization");
        $this->createCourse($computing_major,"1710", "Web Design and Development");
        $this->createCourse($computing_major,"1900", "Math for Computer Science");
        
    }
    
    private function createCourse($major_id, $course_number, $course_name){
        
        $data = new App\Course;
        $data->major()->associate($major_id);
        $data->course_number = $course_number;
        $data->course_name = $course_name;
        $data->save();
        
    }
}
