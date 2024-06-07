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

namespace InvoiceNinja\EInvoice\Models\Normalizers;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use ReflectionClass;

class DecimalPrecisionNormalizer implements NormalizerInterface
{
    private ObjectNormalizer $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function normalize($object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = $this->normalizer->normalize($object, $format, $context);

        if (is_object($object)) {
            $reflectionClass = new ReflectionClass($object);
            foreach ($reflectionClass->getProperties() as $property) {
                $attributes = $property->getAttributes(DecimalPrecision::class);
                if (!empty($attributes)) {
                    $attribute = $attributes[0]->newInstance();
                    $propertyName = $property->getName();

                    if (isset($data[$propertyName]) && is_numeric($data[$propertyName])) {
                        $data[$propertyName] = number_format($data[$propertyName], $attribute->precision, '.', '');
                    }
                }
            }
        }

        return $data;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data);
    }

    public function getSupportedTypes(?string $format): array
    {
        return ['float','string'];
    }
}
