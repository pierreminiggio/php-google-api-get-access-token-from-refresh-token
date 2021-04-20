<?php

namespace PierreMiniggio\GoogleTokenRefresher;

class AccessTokenProvider
{

    /**
     * Get a Refresh Token using your Client Id and Client Secret here : https://developers.google.com/oauthplayground
     *
     * @throws AuthException
     */
    public function get(string $clientId, string $clientSecret, string $refreshToken): string
    {
        $curl = curl_init('https://www.googleapis.com/oauth2/v4/token');
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query([
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'refresh_token' => $refreshToken,
                'grant_type' => 'refresh_token'
            ])
        ]);
        $curlResult = curl_exec($curl);
        curl_close($curl);

        if ($curlResult === false) {
            $curlError = curl_error($curl);

            throw new AuthException($curlError);
        }

        $jsonResponse = json_decode($curlResult, true);

        if (! empty($jsonResponse['error'])) {
            $apiError = 'Error ' . $jsonResponse['error']['code'] . ': ' . $jsonResponse['error']['message'];

            throw new AuthException($apiError);
        }

        if (empty($jsonResponse['access_token'])) {
            throw new AuthException('Received no Access Token');
        }

        return $jsonResponse['access_token'];
    }

    /**
     * @throws AuthException
     */
    public function getFromClient(GoogleClient $client): string
    {
        return $this->get($client->clientId, $client->clientSecret, $client->refreshToken);
    }
}
