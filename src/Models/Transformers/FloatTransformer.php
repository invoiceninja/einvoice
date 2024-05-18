<?php

namespace Invoiceninja\Einvoice\Models\Transformers;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class FloatTransformer implements Transformer
{

    public function __construct(private ?int $precision = 2){}

    public function transform(DataProperty $property, mixed $value): mixed
    {
        return number_format($value, $this->precision);
    }
}
