<?php

namespace Invoiceninja\Einvoice\Models\Transformers;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;
use Spatie\LaravelData\Support\Transformation\TransformationContext;


class FloatTransformer implements Transformer
{

    public function __construct(private ?int $precision = 2){}

    public function transform(DataProperty $property, mixed $value, TransformationContext $context): mixed
    {
        return number_format($value, $this->precision);
    }
}
