<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function text_see_in_post_view()
    {
        $response = $this->get('/get');

        $response->assertStatus(200);
        $response->assertSee('Novri');
    }
}
