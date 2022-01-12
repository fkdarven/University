<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Course;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseUnitTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateCourse()
    {
        Course::create([
            'name' => 'Educação_Fisíca',
            'total_time' => 50,

        ]);
        $this->assertDatabaseHas('courses',['name'=>'Educação_Fisíca']);
    }
}
