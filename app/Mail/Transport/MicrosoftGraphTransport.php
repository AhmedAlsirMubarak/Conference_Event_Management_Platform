<?php

namespace App\Mail\Transport;

use App\Services\MicrosoftGraphMailService;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\Message;

class MicrosoftGraphTransport extends AbstractTransport
{
    protected $graphService;

    public function __construct(MicrosoftGraphMailService $graphService)
    {
        parent::__construct();
        $this->graphService = $graphService;
    }

    protected function doSend(SentMessage $message): void
    {
        $msg = $message->getOriginalMessage();
        
        // Get recipients
        $toAddresses = array_map(fn($addr) => $addr->getAddress(), $msg->getTo());
        
        if (empty($toAddresses)) {
            throw new \Exception('No recipients specified for email');
        }

        // Get email body
        $body = $msg->getHtmlBody() ?? $msg->getTextBody();
        
        // Send to each recipient
        foreach ($toAddresses as $toEmail) {
            $this->graphService->sendMail(
                $toEmail,
                $msg->getSubject(),
                $body,
                $msg->getFrom()[0]->getAddress(),
                $msg->getFrom()[0]->getName()
            );
        }
    }

    public function __toString(): string
    {
        return 'graph';
    }

    public static function create(string $dsn): self
    {
        return new self(app(MicrosoftGraphMailService::class));
    }
}
