<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class MicrosoftGraphMailService
{
    protected $client;
    protected $clientId;
    protected $clientSecret;
    protected $tenantId;
    protected $accessToken;
    protected $tokenExpiry;

    public function __construct()
    {
        $this->client = new Client();
        $this->clientId = config('services.graph.client_id');
        $this->clientSecret = config('services.graph.client_secret');
        $this->tenantId = config('services.graph.tenant_id');
    }

    /**
     * Get or refresh access token
     */
    protected function getAccessToken(): string
    {
        if ($this->accessToken && $this->tokenExpiry > now()) {
            return $this->accessToken;
        }

        try {
            $response = $this->client->post(
                "https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token",
                [
                    'form_params' => [
                        'client_id' => $this->clientId,
                        'client_secret' => $this->clientSecret,
                        'scope' => 'https://graph.microsoft.com/.default',
                        'grant_type' => 'client_credentials',
                    ],
                    'verify' => false,  // Disable SSL verification for local testing
                ]
            );

            $data = json_decode($response->getBody(), true);
            $this->accessToken = $data['access_token'];
            $this->tokenExpiry = now()->addSeconds($data['expires_in'] - 60);

            return $this->accessToken;
        } catch (GuzzleException $e) {
            Log::error('Microsoft Graph token error: ' . $e->getMessage());
            throw new \Exception('Failed to get Microsoft Graph access token: ' . $e->getMessage());
        }
    }

    /**
     * Send email via Microsoft Graph API
     */
    public function sendMail(
        string $toEmail,
        string $subject,
        string $htmlBody,
        ?string $fromEmail = null,
        ?string $fromName = null,
        array $replyTo = [],
        array $attachments = []
    ): bool {
        try {
            $token = $this->getAccessToken();
            $fromEmail = $fromEmail ?? config('mail.from.address');
            $fromName = $fromName ?? config('mail.from.name');

            $message = [
                'message' => [
                    'subject' => $subject,
                    'body' => [
                        'contentType' => 'HTML',
                        'content' => $htmlBody,
                    ],
                    'from' => [
                        'emailAddress' => [
                            'address' => $fromEmail,
                            'name' => $fromName,
                        ],
                    ],
                    'toRecipients' => [
                        [
                            'emailAddress' => [
                                'address' => $toEmail,
                            ],
                        ],
                    ],
                ],
                'saveToSentItems' => true,
            ];

            // Add reply-to if provided
            if (!empty($replyTo)) {
                $message['message']['replyToRecipients'] = array_map(function ($email) {
                    return [
                        'emailAddress' => [
                            'address' => $email,
                        ],
                    ];
                }, $replyTo);
            }

            // Send the email
            $response = $this->client->post(
                "https://graph.microsoft.com/v1.0/users/{$fromEmail}/sendMail",
                [
                    'headers' => [
                        'Authorization' => "Bearer {$token}",
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $message,
                    'verify' => false,  // Disable SSL verification for local testing
                ]
            );

            Log::info("Email sent via Microsoft Graph to {$toEmail}");
            return true;
        } catch (GuzzleException $e) {
            Log::error('Microsoft Graph send error: ' . $e->getMessage());
            throw new \Exception('Failed to send email via Microsoft Graph: ' . $e->getMessage());
        }
    }
}