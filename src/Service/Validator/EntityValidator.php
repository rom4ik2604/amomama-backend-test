<?php


namespace App\Service\Validator;


use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class EntityValidator extends AbstractValidator implements ValidatorInterface
{
    public function validate($data): array
    {
        return $this->prepare($this->validator->validate($data));
    }

    private function prepare(ConstraintViolationListInterface $errors): array
    {
        /** @var ConstraintViolationInterface $error */
        foreach ($errors as $error) {
            $this->errors[$error->getPropertyPath()] = $error->getMessage();
        }

        return $this->errors;
    }
}