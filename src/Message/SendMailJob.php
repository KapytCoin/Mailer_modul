<?php

namespace App\Message;

class SendMailJob
{
    private $content;

    public function __construct(?string $content)
    {
        $this->content = $content;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }
}