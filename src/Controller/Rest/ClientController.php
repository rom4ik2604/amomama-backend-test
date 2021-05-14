<?php

namespace App\Controller\Rest;

use App\Message\SaveClient;
use App\Repository\ClientRepository;
use App\Service\ClientStoreService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ClientController
 * @package App\Controller\Rest
 */
class ClientController extends BaseController
{
    /**
     * @param ClientRepository $clientRepository
     * @return JsonResponse
     */
    public function index(ClientRepository $clientRepository): JsonResponse
    {
        try {
            return $this->response->successResponse($clientRepository->findAll());
        } catch (\Throwable $throwable) {
            return $this->response->internalErrorResponse();
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        $client = ClientStoreService::createClient($request);

        $errors = $this->validator->validate($client);

        if ($errors) {
            return $this->response->badRequestResponse($errors);
        }

        $this->dispatchMessage(new SaveClient($client));

        return $this->response->successResponse();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            return $this->response->successResponse($this->finder->find($request->get('q'), 20));
        } catch (\Throwable $throwable) {
            return $this->response->internalErrorResponse();
        }
    }
}
