<?php
    /**
     * Created by PhpStorm.
     * User: Erin Lorelle
     * Date: 4/7/2018
     * Time: 3:25 PM
     */
    
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$file = fopen('database\seeds\MajorsList.csv', 'r');
        while(!feof($file))
        {
        
            $lines[] = fgetcsv($file, 123);
        }
        fclose($file);
        foreach($lines as $line)
        {
            if($line[0] == "")
            {
                break;
            }
            App\Major::create(['abbr' => $line[0], 'name' => $line[1], 'description' => $line[2]]);
        }
    }*/
    
        $this->createMajor("1", "CSCI", "Computing", "Computer Science Major");
        $this->createMajor("2", "MATH", "Math", "Math Major");
        $this->createMajor("3", "HIST", "History", "History Major");
        $this->createMajor("4", "BIOL", "Biology", "Biology Major");
    }
        
        //Below is testing importing data from Excel. Error due to maatwebsite 3.0 does not yet support imports.
        /*$data = Excel::load('files\majorsList', function($reader){})->get();
        
            foreach($data as $key => $value)
            {
                
                $this->createMajor("$value->id", "$value->abbr", "$value->name", "$value->description");
            
            }*/
    //}
    
        private function createMajor($id, $abbr, $name, $description)
        {

            $data = new App\Major;
            $data->id = $id;            // temporarily hardcoded
            $data->abbr = $abbr;
           $data->name = $name;
            $data->description = $description;
            $data->save();
        }


}
