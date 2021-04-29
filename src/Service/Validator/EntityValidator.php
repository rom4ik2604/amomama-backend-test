<?php


namespace App\Service\Validator;


use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class EntityValidator
 * @package App\Service\Validator
 */
class EntityValidator extends AbstractValidator implements ValidatorInterface
{
    /**
     * @param $data
     * @return array
     */
    public function validate($data): array
    {
        return $this->prepare($this->validator->validate($data));
    }

    /**
     * @param ConstraintViolationListInterface $errors
     * @return array
     */
    private function prepare(ConstraintViolationListInterface $errors): array
    {
        /** @var ConstraintViolationInterface $error */
        foreach ($errors as $error) {
            $this->errors[$error->getPropertyPath()] = $error->getMessage();
        }

        return $this->errors;
    }
}