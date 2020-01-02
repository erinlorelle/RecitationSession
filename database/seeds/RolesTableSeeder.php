<?php
    /**
     * Created by PhpStorm.
     * User: Erin Lorelle
     * Date: 4/7/2018
     * Time: 3:25 PM
     */
    
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRole("1","Student", "Attending Course");
        $this->createRole("2","Professor", "Teaching Course");
        $this->createRole("3","Admin", "Administrator");
    }
    
    protected function createRole($id, $title, $description){
        
        $data = new App\Role;
        $data->id = $id;            // temporarily hardcoded
        $data->title = $title;
        $data->description = $description;
        $data->save();
        
    }
}
