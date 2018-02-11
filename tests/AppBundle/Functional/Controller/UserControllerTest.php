<?php

namespace Tests\AppBundle\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    public function testApiEndpointIsWorking()
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/api/user/tweets/ola/10');

        $code = $client->getResponse()->getStatusCode();

        $this->assertEquals(Response::HTTP_OK, $code);
    }

    public function testApiEndpointIsNotWorking()
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/api/user/ola/10');

        $code = $client->getResponse()->getStatusCode();

        $this->assertEquals(Response::HTTP_NOT_FOUND, $code);
    }

    public function testApiEndpointReturnsJsonResponse()
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/api/user/tweets/DavidTeruel/10');
        $response = $client->getResponse();

        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'));
    }
}
