<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use App\Exception\TheLetterWasNotSentException;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        // Хочу добавить БД с якобы зарегистрированными почтами пользователей, 
        // затем достать и положить их в массив, а дальше, с помощью foreach-генератора, 
        // отправить каждому пользователю рассылку на почту.

        $email = (new Email())
            ->to('name@example.com')
            ->addTo('name@example.com')
            ->subject('Hello!')
            ->text('Sending emails is fun again!')
            ->addPart((new DataPart(new File('/home/ilya/Документы/MemForMailer.jpg'), 'MemForMailer', 'image/jpg'))->asInline())
            ->html('<p>See Twig integration for better HTML integration!</p>');

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            throw new TheLetterWasNotSentException();
        }

        return $this->json('Letter sent');
    }
}