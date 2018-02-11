<?php

namespace AppBundle\Controller;

use AppBundle\Application\Service\TwitterRequest;
use AppBundle\Application\Service\TwitterService;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Cache\Simple\FilesystemCache;

class UsersController extends FOSRestController
{
    /**
     * @Route("/user/tweets/{username}/{number}", defaults={"username" = "DavidTeruel22", "number" = 20})
     * @Method({"GET"})
     *
     * @param $username
     * @param $number
     *
     * @return array|mixed|null
     */
    public function getUserLastTweetsAction($username, $number)
    {
        $cache = new FilesystemCache('tweets', 300);
        $cachedTweets = $cache->has('last_tweets');

        if (!$cachedTweets) {
            $tweets = $this->getTweets($username, $number);

            $cache->set('last_tweets', $tweets);
        } else {
            $tweets = $cache->get('last_tweets');

            if(!array_key_exists($username, $tweets)){
                $tweets = $this->getTweets($username, $number);

                $cache->set('last_tweets', $tweets);
            }
        }

        return $tweets;
    }

    /**
     * @param $username
     * @param $number
     *
     * @return array
     */
    private function getTweets($username, $number)
    {
        $twitterRequest = new TwitterRequest($username, $number);

        /** @var TwitterService $twitterService */
        $twitterService = $this->get('app.twitter_service');

        $tweets = $twitterService->getUserLastTweetsFormatted($twitterRequest);
        return $tweets;
    }
}
