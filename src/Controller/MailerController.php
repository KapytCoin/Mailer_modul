<?php

namespace App\Controller;

use App\Repository\EmailsRepository;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer, MailerService $mailerService, EmailsRepository $emailsRepository): Response
    {
        $mailerService->sendEmail($mailer, $emailsRepository);
        
        return $this->json('The letter has been sent');
    }
}