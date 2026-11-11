<?php

namespace InvoiceNinja\EInvoice\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class RelativeDateExpression extends Constraint
{
    public const PAIR_REQUIRED_ERROR = 'einvoice.relative_date.pair_required';
    public const INVALID_DATE_ERROR = 'einvoice.relative_date.invalid_date';

    protected const ERROR_NAMES = [
        self::PAIR_REQUIRED_ERROR => 'PAIR_REQUIRED_ERROR',
        self::INVALID_DATE_ERROR => 'INVALID_DATE_ERROR',
    ];

    public string $pair_message = 'Enter a start and end date separated by |.';
    public string $date_message = 'Enter a valid date expression on each side of |.';
}
