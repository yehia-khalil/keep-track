<?php

namespace Tests\Unit;

use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExercisesTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_row_added_to_exercises_successfully()
    {
        $response = $this->postJson('api/exercises', ['name' => 'leg extensions']);
        $response->assertStatus(201);
    }

    public function test_get_all_exercises_doesnt_return_zero()
    {
        $exercises = $this->getJson('api/exercises');
        $exercises->assertStatus(200);
    }


}
