<?php

namespace InvoiceNinja\EInvoice\Validation;

use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

final class ValidationResultFormatter
{
    /**
     * The optional callback receives the violation and original constraint message, and
     * returns the application's wording (for example, a translated message).
     *
     * @param null|callable(ConstraintViolationInterface, string): string $messageFormatter
     * @return array{valid: bool, errors: list<array{path: string, code: ?string, message: string}>}
     */
    public static function format(ConstraintViolationListInterface $violations, ?callable $messageFormatter = null): array
    {
        $errors = [];
        foreach ($violations as $violation) {
            $message = $violation->getMessage();
            $errors[] = [
                'path' => $violation->getPropertyPath(),
                'code' => $violation->getCode(),
                'message' => $messageFormatter === null ? $message : $messageFormatter($violation, $message),
            ];
        }

        return ['valid' => count($errors) === 0, 'errors' => $errors];
    }
}
