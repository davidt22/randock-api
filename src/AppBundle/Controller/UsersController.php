<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Renus\LastTweetBundle\Entity\Tweet;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UsersController extends FOSRestController
{
    /**
     * @Route("/users/{id}", defaults={"id" = 1})
     * @Method({"GET"})
     *
     * @param $id
     *
     * @return array
     */
    public function indexAction($id)
    {
        $data = array('Usuarios' => array(
            array(
                'nombre'   => 'Jhon',
                'Apellido' => 'Doe'
            ),
            array(
                'nombre'   => 'Antonio',
                'Apellido' => 'Martinez'
            )));

        return $data;
    }

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
        try{
            $twitterService = $this->get('renus.twitter');
            $tweets = $twitterService->getLastTweets($username, $number);

            $onlyText = array();
            /** @var Tweet $tweet */
            foreach ($tweets as $tweet){
                $value = array('tweet' => $tweet->getText());

                array_push($onlyText, $value);
            }

            return array($username => $onlyText);
        }catch (\Exception $exception){
            return array();
        }
    }
}
