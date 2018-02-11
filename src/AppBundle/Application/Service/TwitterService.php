<?php


namespace AppBundle\Application\Service;


use Renus\LastTweetBundle\Entity\Tweet;
use Renus\LastTweetBundle\Service\Twitter;

class TwitterService
{
    /** @var Twitter */
    private $twitterService;

    /**
     * TwitterWrapper constructor.
     *
     * @param Twitter $twitterService
     */
    public function __construct(Twitter $twitterService)
    {
        $this->twitterService = $twitterService;
    }

    /**
     * @param TwitterRequest $twitterRequest
     *
     * @return array
     */
    public function getUserLastTweetsFormatted(TwitterRequest $twitterRequest)
    {
        try{
            $username = $twitterRequest->getUsername();
            $number = $twitterRequest->getNumber();

            $tweets = $this->twitterService->getLastTweets($username, $number);

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