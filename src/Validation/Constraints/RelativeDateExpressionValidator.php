<?php

namespace InvoiceNinja\EInvoice\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class RelativeDateExpressionValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof RelativeDateExpression) {
            throw new UnexpectedTypeException($constraint, RelativeDateExpression::class);
        }
        if ($value === null || $value === '') {
            return;
        }
        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        $parts = explode('|', $value);
        // Preserve the existing settings convention for short, single-part placeholders.
        if (count($parts) === 1 && strlen($value) <= 2) {
            return;
        }
        if (count($parts) !== 2) {
            $this->context->buildViolation($constraint->pair_message)
                ->setCode(RelativeDateExpression::PAIR_REQUIRED_ERROR)->addViolation();
            return;
        }
        foreach ($parts as $index => $part) {
            try {
                $date = date_create($part);
            } catch (\ValueError) {
                $date = false;
            }
            if ($date === false) {
                $this->context->buildViolation($constraint->date_message)
                    ->setParameter('{{ field }}', $index === 0 ? 'StartDate' : 'EndDate')
                    ->setCode(RelativeDateExpression::INVALID_DATE_ERROR)->addViolation();
                return;
            }
        }
    }
}
