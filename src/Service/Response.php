<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\JsonResponse;

class Response
{
    public function successResponse(array $data = []): JsonResponse
    {
        return new JsonResponse([
            'data' => $data,
            'errors' => [],
        ], 200, []);
    }

    public function badRequestResponse(array $errors): JsonResponse
    {
        return new JsonResponse([
            'data' => [],
            'errors' => $errors
        ], 400, []);
    }

    public function internalErrorResponse(): JsonResponse
    {
        return new JsonResponse([
            'data' => [],
            'errors' => ['Internal server error!']
        ], 500, []);
    }
}