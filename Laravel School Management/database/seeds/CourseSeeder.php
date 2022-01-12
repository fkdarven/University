<?php

use Illuminate\Database\Seeder;
use App\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Course::count()==0)
        {
        	for($i=0;$i<100;$i++)
        	{
        		$course = new Course;
        		$course->name = "DisciplinaTeste".$i;
        		$course->max_students = rand(15,60);
        		$course->description = "EmentaTeste".$i;
        		$course->total_time = rand(30,120);
        		$course->save();
        	}
        }
    }
}
