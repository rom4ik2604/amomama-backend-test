<?php

namespace App\Controller\Rest;

use App\Entity\Client;
use App\Message\SaveClient;
use App\Service\Validator\ValidatorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends AbstractController
{
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Rest/ClientController.php',
        ]);
    }

    public function save(Request $request, ValidatorInterface $validator): JsonResponse
    {
        $requestData = new ArrayCollection($request->toArray());

        $client = new Client();
        $client->setFirstName($requestData->get('firstName'));
        $client->setLastName($requestData->get('lastName'));
        $client->setPhoneNumbers($requestData->get('phoneNumbers') ?? []);

        $errors = $validator->validate($client);

        if ($errors) {
            return $this->json([
                'status' => 'error',
                'errors' => $errors
            ], 400);
        }

        $this->dispatchMessage(new SaveClient($client));

        return $this->json([
            'status' => 'created'
        ], 201);
    }
}
