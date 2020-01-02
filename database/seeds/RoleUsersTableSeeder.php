<?php

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /*$userIds = DB::table('users')->get('id');
        
        get an object
        of each
        $roleIds = DB::table('roles')->get('id');
    
        
        foreach($userIds as $userId)
        {
            //necessary since shuffle() and array_shift() take an array by reference
            $randomizedRoleIds = $roleIds;
        
            shuffle($randomizedRoleIds);
            for($index = 0; $index < 2; $index++) {
                $pivots[] = [
                    'user_id' => $userId,
                    'role_id' => array_shift($randomizedRoleIds)
                ];
            }
        }
    
        DB::table('role_users')->insert($pivots);*/
    }
}
