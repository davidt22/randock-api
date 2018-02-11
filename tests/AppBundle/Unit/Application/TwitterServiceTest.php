<?php

namespace Tests\AppBundle\Unit\Application;

use Abraham\TwitterOAuth\TwitterOAuth;
use AppBundle\Application\Service\TwitterRequest;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterServiceTest extends WebTestCase
{
    public function testGetValidUserLastTweetsAction()
    {
        /** @var TwitterOAuth $renusTwitterMock */
        $renusTwitterMock = $this->createMock(TwitterOAuth::class);
        $twitterServiceMock = new TwitterServiceMock($renusTwitterMock);
        $twitterRequest = new TwitterRequest('davidTeruel22',3);
        $tweets = $twitterServiceMock->execute($twitterRequest);

        $this->assertInternalType('array', $tweets);
        $this->assertCount(3, $tweets['davidTeruel22']);
    }
}
