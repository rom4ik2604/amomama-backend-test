<?php


namespace App\Service\Validator;

use Symfony\Component\Validator\Validator\ValidatorInterface as Validator;

/**
 * Class AbstractValidator
 * @package App\Service\Validator
 */
abstract class AbstractValidator
{
    protected Validator $validator;

    public array $errors = [];

    /**
     * AbstractValidator constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }
}