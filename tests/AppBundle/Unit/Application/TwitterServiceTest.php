<?php

namespace Tests\AppBundle\Unit\Application;

use AppBundle\Application\Service\TwitterRequest;
use Renus\LastTweetBundle\Service\Twitter;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterServiceTest extends WebTestCase
{
    public function testGetValidUserLastTweetsAction()
    {
        /** @var Twitter $renusTwitterMock */
        $renusTwitterMock = $this->createMock(Twitter::class);
        $twitterServiceMock = new TwitterServiceMock($renusTwitterMock);
        $twitterRequest = new TwitterRequest('davidTeruel22',3);
        $tweets = $twitterServiceMock->execute($twitterRequest);

        $this->assertInternalType('array', $tweets);
        $this->assertCount(3, $tweets['davidTeruel22']);
    }
}
