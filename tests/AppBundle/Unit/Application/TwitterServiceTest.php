<?php

namespace Tests\AppBundle\Unit\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterServiceTest extends WebTestCase
{
    public function testGetValidUserLastTweetsAction()
    {
        $renusServiceMock = new RenusTwitterMock('', '', '', '');
        $tweets = $renusServiceMock->getLastTweets('','');

        $this->assertInternalType('array', $tweets);
        $this->assertCount(3, $tweets['userTwitter']);
    }

    public function testGetEmptyUserLastTweetsAction()
    {
        $renusServiceMock = new RenusTwitterEmptyMock('', '', '', '');
        $tweets = $renusServiceMock->getLastTweets('','');

        $this->assertInternalType('array', $tweets);
        $this->assertCount(0, $tweets['userTwitter']);
    }
}
