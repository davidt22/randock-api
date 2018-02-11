<?php


namespace AppBundle\Application\Service;


class TwitterRequest
{
    /** @var string */
    private $username;

    /** @var int */
    private $number;

    /**
     * TwitterRequest constructor.
     *
     * @param string $username
     * @param string $number
     */
    public function __construct($username = 'DavidTeruel22', $number = '20')
    {
        $this->username = $username;
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}