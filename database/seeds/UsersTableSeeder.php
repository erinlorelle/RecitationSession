<?php
    /**
     * Created by PhpStorm.
     * User: Erin Lorelle
     * Date: 4/7/2018
     * Time: 3:25 PM
     */
    
use Illuminate\Database\Seeder;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i < 20; $i++){
            
            $user = new App\User;
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = strtolower($user->last_name . substr($user->first_name, 0, 1) . "@etsu.edu");
            $user->save();
            
            $user->roles()->attach(Role::where('title', 'Student')->get());
            
            
            
        }
        
        
        
        
        /*$this->createUser("1","DESJARDINSM@mail.etsu.edu", "Mathew", "Desjardins");
        $this->createUser("2","zelc@etsu.edu", "Erin", "Lorelle");
        $this->createUser("3","MCFLYM@.etsu.edu", "Marty", "McFly");
        $this->createUser("4","BROWNE@.etsu.edu", "Doc", "Brown");
        $this->createUser("5","BUNNYB@.etsu.edu", "Bugs", "Bunny");
        $this->createUser("6","RABBITR@.etsu.edu", "Roger", "Rabbit");
        $this->createUser("7","YANKOVIC@.etsu.edu", "Weird Al", "Yankovic");*/
    }
    
    /*private function createUser($id, $email, $first_name, $last_name){
        
        $data = new App\User;
        $data->id = $id;                    // temporarily hardcoded
        $data->email = $email;
        $data->first_name = $first_name;
        $data->last_name = $last_name;;
        $data->save();
        
    }*/
    

}
