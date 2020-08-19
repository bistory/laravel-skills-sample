<?php

namespace App\Classes\Actions\Auth;

use App\Classes\Actions\Action;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class Login extends Action
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * Login constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.passport.endpoint'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);
    }


    /**
     * @return array
     * @throws Exception
     */
    public function do(): array
    {
        try {
            $response = $this->client->post('oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => request('email'),
                    'password' => request('password'),
                ],

            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (BadResponseException $e) {
            throw new Exception('invalid_user');
        }
    }
}
