<?php


namespace App\Service\Validator;

use Symfony\Component\Validator\Validator\ValidatorInterface as Validator;

abstract class AbstractValidator
{
    protected Validator $validator;

    public array $errors = [];

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }
}