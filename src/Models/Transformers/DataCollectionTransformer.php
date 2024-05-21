<?php

namespace Invoiceninja\Einvoice\Models\Transformers;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContext;

class DataCollectionTransformer implements Cast,Transformer
{
    public function __construct(private ?bool $ignore = false)
    {
    }    

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): string
    {
        if($this->ignore)
            return $property->type->dataClass::collection($value);

            $coll = [];

            foreach($value as $array) {
                $coll[] = $property->type->dataClass::from($array);
            }
            
            $y = $property->type->dataClass::collection($coll);

            return $y;

    }
    
    public function transform(DataProperty $property, mixed $value, TransformationContext $context): string
    {
        return count($value) <= 1 ? [$value] : $value;
    }
}
