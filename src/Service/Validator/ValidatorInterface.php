<?php


namespace App\Service\Validator;


interface ValidatorInterface
{
    public function validate($data): array;
}