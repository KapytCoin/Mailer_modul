<?php

namespace App\MessageHandler;

use App\Message\SendMailJob;
use App\Repository\EmailsRepository;
use App\Service\MailerService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mailer\MailerInterface;

#[AsMessageHandler]
class SendMailHandler
{
    public function __construct(
        private MailerService $mailerService,
        private EmailsRepository $emailsRepository,
        private MailerInterface $mailerInterface,
        ) {}

    public function __invoke(SendMailJob $sendMailJob): void
    {
        $this->mailerService->sendEmail($this->mailerInterface, $this->emailsRepository);
    }
}