<?php

namespace Tests\AppBundle\Functional\Controller;

use GuzzleHttp\Exception\ClientException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RandockAPITest extends WebTestCase
{
    public function testAPIGetRequest()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request(Request::METHOD_GET, 'http://localhost:8000/api/user/tweets/davidTeruel22/200');
        $data = json_decode($res->getBody(), true);

        $this->assertEquals(Response::HTTP_OK, $res->getStatusCode());
        $this->assertArrayHasKey('davidTeruel22', $data);
    }

    public function testAPIGetRequestFails()
    {
        try{
            $client = new \GuzzleHttp\Client();
            $client->request('GET', 'http://localhost:8000/tweets/davidTeruel22/200');

        }catch (ClientException $clientException){
            $this->assertEquals(Response::HTTP_NOT_FOUND, $clientException->getResponse()->getStatusCode());
        }
    }

}
