<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/einvoice source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace InvoiceNinja\EInvoice\Models\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validation;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AttributeExistsValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {

        if (!$constraint instanceof AttributeExists) {
            throw new UnexpectedTypeException($constraint, AttributeExists::class);
        }

        // Get the property name
        $property = $this->context->getPropertyName();

        echo $property.PHP_EOL;

        // Get the root object
        $data = $this->context->getRoot();

        // Check if the property exists
        if (!property_exists($data, $property)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ property }}', $property)
                ->addViolation();
        } else {
            // Validate nested properties recursively
            $nestedValidator = Validation::createValidator();
            $errors = $nestedValidator->validate($value, null, $this->context->getConstraint()->groups);
            foreach ($errors as $error) {
                $this->context->buildViolation($error->getMessage())
                    ->atPath($property . '.' . $error->getPropertyPath())
                    ->addViolation();
            }
        }


    }
}
