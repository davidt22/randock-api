<?php


namespace Tests\AppBundle\Unit\Application;


use Renus\LastTweetBundle\Service\Twitter;
use Symfony\Component\HttpFoundation\JsonResponse;

class RenusTwitterEmptyMock extends Twitter
{
    public function getLastTweets($username, $count, $replies = false, $rts = false)
    {
        $data = '
            {"userTwitter":[]}
        ';

        /** @var array $data */
        $data = json_decode($data, true);

        return $data;
    }
}