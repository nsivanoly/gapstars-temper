<?php

namespace Tests\Feature;

use Tests\TestCase;

class RetentionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * testGetRetentionData
     */
    public function testGetRetentionData()
    {
        $response = $this->json('GET', 'api/get_retention_chart_data', []);

        $response->assertStatus(200); // Response 200
    }
}
