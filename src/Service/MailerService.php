<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use App\Exception\TheLetterWasNotSentException;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;

class MailerService
{
    public function sendEmail(MailerInterface $mailer): void
    {
        $email = (new Email())
            ->to('lilgorec@yandex.ru')
            ->subject('Hello!')
            ->text('Sending emails is fun again!')
            ->addPart((new DataPart(new File('/home/ilya/Документы/MemForMailer.jpg'),
            'MemForMailer', 'image/jpg'))->asInline())
            ->html('<p>See Twig integration for better HTML integration!</p>');

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            throw new TheLetterWasNotSentException();
        }
    }
}