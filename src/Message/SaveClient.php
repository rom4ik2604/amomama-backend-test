<?php


namespace App\Message;


use App\Entity\Client;

/**
 * Class SaveClient
 * @package App\Message
 */
class SaveClient
{
    private Client $client;

    /**
     * SaveClient constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}