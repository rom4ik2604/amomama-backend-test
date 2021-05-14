<?php


namespace App\Controller\Rest;


use App\Service\Response;
use App\Service\Validator\ValidatorInterface;
use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class BaseController extends AbstractController
{
    protected PaginatedFinderInterface $finder;

    protected Response $response;

    protected ValidatorInterface $validator;

    /**
     * ClientController constructor.
     * @param PaginatedFinderInterface $finder
     */
    public function __construct(PaginatedFinderInterface $finder, ValidatorInterface $validator, Response $response)
    {
        $this->finder = $finder;
        $this->response = $response;
        $this->validator = $validator;
    }
}