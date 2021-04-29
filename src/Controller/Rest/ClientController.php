<?php

namespace App\Controller\Rest;

use App\Entity\Client;
use App\Message\SaveClient;
use App\Repository\ClientRepository;
use App\Service\Validator\ValidatorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ClientController
 * @package App\Controller\Rest
 */
class ClientController extends AbstractController
{
    private PaginatedFinderInterface $finder;

    /**
     * ClientController constructor.
     * @param PaginatedFinderInterface $finder
     */
    public function __construct(PaginatedFinderInterface $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @param ClientRepository $clientRepository
     * @return JsonResponse
     */
    public function index(ClientRepository $clientRepository): JsonResponse
    {
        return $this->json($clientRepository->findAll());
    }

    /**
     * @param Request $request
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        return $this->json($this->finder->find($request->get('q')));
    }
}
