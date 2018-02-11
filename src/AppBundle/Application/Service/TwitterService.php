<?php


namespace AppBundle\Application\Service;



use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterService
{
    const STATUSES_USER_TIMELINE = 'statuses/user_timeline';
    /** @var TwitterOAuth */
    private $oauthTwitter;

    /**
     * TwitterService constructor.
     *
     * @param TwitterOAuth $oauthTwitter
     */
    public function __construct(TwitterOAuth $oauthTwitter)
    {
        $this->oauthTwitter = $oauthTwitter;
    }


    /**
     * @param TwitterRequest $twitterRequest
     *
     * @return array
     */
    public function execute(TwitterRequest $twitterRequest)
    {
        try{
            $username = $twitterRequest->getUsername();
            $number = $twitterRequest->getNumber();
            $parameters = ['q' => $username, 'count' => $number];

            $tweets = $this->oauthTwitter->get(self::STATUSES_USER_TIMELINE, $parameters);

            $onlyText = array();
            /** @var \stdClass $tweet */
            foreach ($tweets as $tweet){
                $value = array('tweet' => $tweet->text);

                array_push($onlyText, $value);
            }

            return array($username => $onlyText);
        }catch (\Exception $exception){
            return array();
        }
    }
}