<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class LabyrinthCatalog
{
    /** @var string */
    private string $host;

    /** @var string */
    private string $tokenEnpoint;

    /** @var string */
    private string $catalogEnpoint;

    /** @var string */
    private string $bearerToken;

    /**
     * Constructs the LabyrinthCatalog client.
     *
     */
    public function __construct()
    {
        $this->host = config('catalog.host');
        $this->tokenEnpoint = config('catalog.tokenEndpoint');
        $this->catalogEnpoint = config('catalog.catalogEnpoint');

        $response = Http::post($this->getAuthUrl(), [
            'email' => 'test@test.com',
            'password' => '123456',
        ]);
        $this->bearerToken = $response->json()['access_token'];
    }

    /**
     * Get the catalog data.
     *
     * @return Collection
     */
    public function get(): Collection
    {
        $response = Http::withToken($this->bearerToken)->get($this->getCatalogUrl());

        return collect($response->json());
    }

    /**
     * Return the auth URL.
     *
     * @return string
     */
    public function getAuthUrl(): string
    {
        return $this->host . $this->tokenEnpoint;
    }

    /**
     * Return the catalog URL.
     *
     * @return string
     */
    public function getCatalogUrl(): string
    {
        return $this->host . $this->catalogEnpoint;
    }
}
