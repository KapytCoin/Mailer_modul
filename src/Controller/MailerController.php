<?php

namespace App\Controller;

use App\Message\SendMailJob;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MessageBusInterface $bus): Response
    {
        // $emails = $emailsRepository->findAll();
        // foreach ($emails as $email) {
        //     $res = $email->getEmail();
        // }

        $bus->dispatch(new SendMailJob(''));
        
        return $this->json('The letter has been sent');
    }
}