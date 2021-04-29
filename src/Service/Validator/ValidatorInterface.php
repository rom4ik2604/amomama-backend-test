<?php


namespace App\Service\Validator;

/**
 * Interface ValidatorInterface
 * @package App\Service\Validator
 */
interface ValidatorInterface
{
    /**
     * @param $data
     * @return array
     */
    public function validate($data): array;
}