<?php


namespace App\Service;


use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;

class ClientStoreService
{
    public static function createClient(Request $request): Client
    {
        $client = new Client();
        $client->setFirstName($request->get('firstName'));
        $client->setLastName($request->get('lastName'));
        $client->setPhoneNumbers($request->get('phoneNumbers') ?? []);

        return $client;
    }
}