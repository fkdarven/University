<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseIndexViewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCourseIndexView()
    {
        $this->get('/courses')->assertStatus(200);
    }
}
