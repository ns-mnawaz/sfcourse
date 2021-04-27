<?php


namespace App\Tests\integration;


use App\Tests\DatabaseDependentTestCase;

class HealthApiClientTest extends DatabaseDependentTestCase
{
    /**
     * @test
     * @group integration
     */
    public function the_health_api_return_data(){
        $apiClient = self::$kernel->getContainer()->get('api-client');
        $res = $apiClient->get('health/', [], []);
        $response = json_decode($res->getContent());

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertSame(123, $response->data);
    }
}
