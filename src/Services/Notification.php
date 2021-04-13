<?php


namespace App\Services;


class Notification
{
    /**
     * @var string
     */
    private $email;

    /**
     * Notification constructor.
     * @param string $email
     */
    public function __construct(string $email){
        dump($email); die;
       // $this->email = $email;
    }

    /**
     *
     */
    public function sendNotification(){

    }
}
