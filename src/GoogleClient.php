<?php

namespace PierreMiniggio\GoogleTokenRefresher;

class GoogleClient
{
    
    public string $clientId;
    public string $clientSecret;
    public string $refreshToken;

    public function __construct(string $clientId, string $clientSecret, string $refreshToken)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->refreshToken = $refreshToken;
    }
}
