<?php

namespace Invoiceninja\Einvoice\Models\Rules;

use Spatie\LaravelData\Support\Validation\ValidationPath;
use Spatie\LaravelData\Attributes\Validation\CustomValidationAttribute;


#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER)]
class StringArrayRule extends CustomValidationAttribute
{
    /**
     * @return array<object|string>|object|string
     */
    public function getRules(ValidationPath $path): array|object|string
    {
        return [new StringRule()];
    }
}