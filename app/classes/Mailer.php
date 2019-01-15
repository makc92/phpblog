<?php
namespace App\classes;
use SimpleMail;


class Mailer
{
    private $mailer;

    public function __construct(SimpleMail $mail)
    {
        $this->mailer= $mail;
    }

    public function send($email,$text)
    {
        SimpleMail::make()
            ->setTo($email, 'Пользователь')
            ->setFrom('blogmakc@mail.ru', 'From Blog')
            ->setSubject('Подтвердите email')
            ->setMessage($text)
            ->send();
    }
}