<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Prasts tests vai ir pieejama sākumlapa
     *
     * @return void
     */
    public function test_ir_pieejama_sakumlapa()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
