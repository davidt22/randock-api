<?php

namespace AppBundle\Controller;

use AppBundle\Application\Service\TwitterRequest;
use AppBundle\Application\Service\TwitterService;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UsersController extends FOSRestController
{
    /**
     *
     * @Route("/user/tweets/{username}/{number}", defaults={"username" = "DavidTeruel22", "number" = 20})
     * @Method({"GET"})
     *
     * @param $username
     * @param int $number
     *
     * @return array
     */
    public function getUserLastTweetsAction($username, $number)
    {
        $twitterRequest = new TwitterRequest($username, $number);

        /** @var TwitterService $twitterService */
        $twitterService = $this->get('app.twitter_service');

        $tweets = $twitterService->getUserLastTweetsFormatted($twitterRequest);

        return $tweets;
    }
}
