<?php


namespace Tests\AppBundle\Unit\Application;


use Renus\LastTweetBundle\Service\Twitter;
use Symfony\Component\HttpFoundation\JsonResponse;

class RenusTwitterMock extends Twitter
{
    public function getLastTweets($username, $count, $replies = false, $rts = false)
    {
        $data = '
        
            {"userTwitter":[
                {"tweet":"Cuando haces las cosas mal, pasan estas cosas. Encima el certificado lleva caducado decadas \u00a1\u00a1 #basuritas #chapuzas\u2026 https:\/\/t.co\/Mi9YBBn071"},
                {"tweet":"Hay verdades novelas de amor en hilos de discusion de @github . Que aburriemiento. #boring #sad #love"},
                {"tweet":"Cuando el codigo no tiene nada que ver con el comentario que lo precede y ademas no dice nada \u00a1 https:\/\/t.co\/tPjV3XOBnu"}
            ]}
        ';

        /** @var array $data */
        $data = json_decode($data, true);

        return $data;
    }
}